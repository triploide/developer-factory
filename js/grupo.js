$(document).ready(function () {
    pageSetUp();
    $('#left-panel li[data-nav="grupos"]').addClass('active');

    ajaxImagesUploader.create({
        elements: $('.imagenUploader'),
        uploadController: BASE_URL+'php/uploaders/grupo.uploader.php',
        deleteController: BASE_URL+'php/erasers/grupoImagen.eraser.php',
        imgprefix: $('input[name="imgprefix"]').val(),
        imgDropzone: BASE_URL+'img/dropzone.gif'
    });
    $('.saveForm').on('click', function () {
        var error = '';
        if (!$('input[name="nombre"]').val()) error = 'Tenés que agregar un títilo<br/>';
        if (error != '') {
            boxError(error);
        } else {
            $('#formGrupo').submit();
        }
    })
});