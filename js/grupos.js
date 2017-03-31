$(document).ready(function () {
    pageSetUp();
    dtInit();
    boxes();
    borrar();
    borrarModalInit();
    $('#left-panel li[data-nav="gruposgrupo"]').addClass('active');
});

var dataTable, currentRow = 0,
    responsiveHelper_dt_basic = undefined,
    breakpointDefinition = {
        tablet : 1024,
        phone : 480
    }
;

var formatData = {
    imagen: {
        data: {
            'noImage':'imagen-no-disponible.jpg',
            'path': '/content/grupos/'
        },
        render: function (imagen) {
            imagen = imagen || this.data.noImage;
            return '\
                 <a href="javascript:void(0);" rel="tooltip" data-placement="top" data-original-title="<img width=\'120\' src=\''+BASE_URL+this.data.path+imagen+'\' class=\'online\'>" data-html="true">\
                    <img style="width:30px; border: solid 1px #ccc" src="'+BASE_URL+this.data.path+'thumb/'+imagen+'"\
                </a>\
            ';
        }
    },
    puntos: function (grupo) {
        var puntos = grupo.puntos * 1;
        return '<a href="puntos" class="editable editable-click" data-id="'+grupo.id+'" data-type="text" data-original-title="Puntos">' + puntos + '</a>';
    },
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
            <a href="grupo/'+row.slug+'" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>\
            <a href="grupo/'+row.slug+'/seleccionar-integrante" class="btn btn-info btn-sm"><i class="fa fa-random"></i></a>\
            <a data-id="'+row.id+'" class="borrar btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>\
        ';
    }
}

function dtInit () {
    dataTable = $('#tableGrupos').dataTable({
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
            "t"+
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth" : true,
        processing: false,
        serverSide: true,
        stateSave: false,
        ajax: BASE_URL+'php/providers/grupos.provider.php',
        language: dtLanguage,
        "preDrawCallback" : function() {
            // Initialize the responsive datatables helper once.
            if (!responsiveHelper_dt_basic) {
                responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#tableGrupos'), breakpointDefinition);
            }
        },
        "rowCallback" : function(nRow, aData) {
            responsiveHelper_dt_basic.createExpandIcon(nRow);
        },
        "drawCallback" : function(oSettings) {
            $('a[rel="tooltip"]').tooltip();
            puntos();
            responsiveHelper_dt_basic.respond();
        },
        columnDefs: [
            {
                render: function ( data, type, row ) {
                    return formatData.imagen.render(row.imagen);
                },
                targets: 0
            },
            {
                render: function ( data, type, row ) {
                    return row.nombre;
                },
                targets: 1
            },
            {
                render: function ( data, type, row ) {
                    return formatData.shortenerText(row.integrantes);
                },
                targets: 2
            },
            {
                render: function ( data, type, row ) {
                    return formatData.puntos(row);
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
                targets: [0,1,2,4]
            }
        ],
        order: [[ 3, "desc" ]]
    });
}

//puntos
function puntos () {
    $('.editable').editable({
        'url': BASE_URL+'php/controllers/grupo.controller.php',
        send: 'always',
        name:'puntos',
        value: function () {
            return '';
        },
        params: function (params) {
            params.id = $(this).attr('data-id');
            params.puntos = params.value;
            return params; 
        },
        ajaxOptions: {
            type: 'post',
            dataType: 'json' //assuming json response
        },
        success: function (response) {
            if(!response.success) return response.error;
            return {newValue: response.value}
        }
    })
}

//borrar
function borrar () {
    var id, $row;
    $('#tableGrupos').on('click', '.borrar', function (event) {
        $row = $(this).parents('tr');
        id = $(this).attr('data-id');
        event.preventDefault();
        borrarModalInit();
        $('#modalBorrar').modal('show');
        $('#modalBorrar .action').click(function () {
            $('#modalBorrar .modal-footer button').unbind('click');
            loaderModalInit();
            $.ajax({
                type:'post',
                url: BASE_URL+'php/erasers/grupo.eraser.php',
                data:{'id':id},
                success: function (data) {
                    $('#modalBorrar').modal('hide');
                    if (data.error == false) {
                        $row.fadeOut(
                            500,
                            function () {
                                $row.remove();
                                if ($('#tableGrupos tbody tr').length == 0) dataTable.api().ajax.reload();
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
    $('#modalBorrar .modal-title .text').html('Borrar Grupo');
    $('#modalBorrar .modal-title .jarviswidget-loader').hide();
    $('#modalBorrar .modal-body .content').html('<p>¿Está seguro que desea borrar este grupo?</p>');
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
    if (document.location.hash == '#new') boxSuccess('El grupo se creó con éxito');
    if (document.location.hash == '#edit') boxSuccess('El grupo se editó con éxito');
    if (document.location.hash == '#borrado') boxSuccess('El grupo se eliminó con éxito');
    document.location.hash = '';
}
//---