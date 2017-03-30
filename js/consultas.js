$(document).ready(function () {
    pageSetUp();
    dtInit();
    boxes();
    borrar();
    borrarModalInit();
    $('#left-panel li[data-nav="consultas"]').addClass('active');
});

var dataTable, currentRow = 0,
    responsiveHelper_dt_basic = undefined,
    breakpointDefinition = {
        tablet : 1024,
        phone : 480
    }
;

var formatData = {
    labelMap: {
        data: {
            1:{i: 1,'label':'success','value':'Leída'},
            0:{i: 0,'label':'warning','value':'No Leída'}
        },
        getLabel: function (estado_id) {
            return this.data[estado_id];
        },
        render : function (row) {
            var estado = this.data[row.estado_id];
            return '<span data-id="'+row.id+'" data-estado="'+estado.i+'" class="label label-'+estado.label+'">'+estado.value+'</span>'
        }
    },
    shortenerText: function (text, length) {
        length = length || 34;
        if (!text) return '';
        return (text.length > length)?'<a href="javascript:void(0);" rel="tooltip" data-placement="top" data-original-title=\''+text+'\' data-html="false">'+text.substring(0, length)+'...'+'</a>':text;
    },
    normalizeDate: function (date) {
        return (!date)?'':date.replace(/.*([0-9]{4})-([0-9]{2})-([0-9]{2}).*/, '$3-$2-$1');
    },
    acciones: function (row) {
        return '\
            <a href="consulta/'+row.id+'" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>\
            <a data-consulta="'+row.id+'" class="borrar btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>\
        ';
    }
}

function dtInit () {
    dataTable = $('#tableConsultas').dataTable({
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
            "t"+
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth" : true,
        processing: false,
        serverSide: true,
        stateSave: false,
        ajax: BASE_URL+'admin/php/providers/consultas.provider.php',
        language: dtLanguage,
        language: dtLanguage,
        "preDrawCallback" : function() {
            // Initialize the responsive datatables helper once.
            if (!responsiveHelper_dt_basic) {
                responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#tableConsultas'), breakpointDefinition);
            }
        },
        "rowCallback" : function(nRow, aData) {
            responsiveHelper_dt_basic.createExpandIcon(nRow);
        },
        "drawCallback" : function(oSettings) {
            $('a[rel="tooltip"]').tooltip();
            responsiveHelper_dt_basic.respond();
        },
        columnDefs: [
            {
                render: function ( data, type, row ) {
                    return formatData.normalizeDate(row.fecha)
                },
                targets: 0
            },
            {
                render: function ( data, type, row ) {
                    return formatData.shortenerText(row.nombre, 55);
                },
                targets: 1
            },
            {
                render: function ( data, type, row ) {
                    return formatData.shortenerText(row.contenido, 55);
                },
                targets: 2
            },
            {
                render: function ( data, type, row ) {
                    return formatData.labelMap.render(row);
                },
                targets: 3
            },
            {
                render: function ( data, type, row ) {
                    return formatData.acciones(row);
                },
                targets: 4
            },
            { 
                sortable: false,
                targets: [3,1,2,4]
            }
        ],
        order: [[ 0, "asc" ]]
    });
}

//borrar
function borrar () {
    var id, $row;
    $('#tableConsultas').on('click', '.borrar', function (event) {
        $row = $(this).parents('tr');
        id = $(this).attr('data-consulta');
        event.preventDefault();
        borrarModalInit();
        $('#modalBorrar').modal('show');
        $('#modalBorrar .action').click(function () {
            $('#modalBorrar .modal-footer button').unbind('click');
            loaderModalInit();
            $.ajax({
                type:'post',
                url: BASE_URL+'admin/php/erasers/consulta.eraser.php',
                data:{'id':id},
                success: function (data) {
                    $('#modalBorrar').modal('hide');
                    if (data.error == false) {
                        $row.fadeOut(
                            500,
                            function () {
                                $row.remove();
                                if ($('#tableConsultas tbody tr').length == 0) dataTable.api().ajax.reload();
                            }
                        );
                    } else {
                        boxError(data.error);
                    }
                },
                error: function() {
                    $('#modalBorrar').modal('hide');
                }
            });
        });
    });
}
//---

//modals
function borrarModalInit () {
    $('#modalBorrar .modal-title .text').html('Borrar Consulta');
    $('#modalBorrar .modal-title .jarviswidget-loader').hide();
    $('#modalBorrar .modal-body .content').html('<p>¿Está seguro que desea borrar esta consulta?</p>');
    $('#modalBorrar #modalAction').html('Borrar').addClass('btn-danger');
    $('#modalBorrar .modal-footer button').attr('disabled', false);
    $('#modalBorrar .modal-footer button.btn-default').show();
    $('#modalBorrar .modal-dialog').css('width', '');
}

function loaderModalInit () {
    $('#modalBorrar .modal-title .jarviswidget-loader').show();
    $('#modalBorrar .modal-body .content').html('Por favor espere...');
    $('#modalBorrar .modal-footer button').attr('disabled', true);
}
//---

//boxes
function boxes () {
    if (document.location.hash == '#borrado') boxSuccess('La consulta se eliminó con éxito');
    document.location.hash = '';
}
//---