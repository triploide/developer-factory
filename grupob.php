<?php
include_once('php/includes/definer.php');
include('php/bootstrap.php');
include('php/checkers/login.checker.php');
?>
<!DOCTYPE html>
<html lang="es-ar">
    <head>
        <?php include('tpl/partials/head.tpl'); ?>
    </head>

    <body>

        <?php include('tpl/partials/header.tpl'); ?>

        <?php include('tpl/partials/aside-left.tpl'); ?>

        <!-- MAIN PANEL -->
        <div id="main" role="main">
            <?php include('php/printers/grupo.printer.php'); ?>
        </div>
        <!-- END MAIN PANEL -->

        <?php include('tpl/partials/footer.tpl'); ?>

        <!-- tpls -->
        <?php include('tpl/modals/borrar.tpl'); ?>

        <!--================================================== -->

        <?php include('tpl/partials/javascript.tpl'); ?>

        <!-- PAGE RELATED PLUGIN(S) -->   
        <script src="<?php echo(URL); ?>js/plugin/jquery-form/jquery-form.min.js"></script>
        <script src="<?php echo(URL); ?>js/Replacer.js"></script>
        <script src="<?php echo(URL); ?>js/boxMessage.js"></script>
        <script src="<?php echo(URL); ?>js/ajaxImagesUploader.js"></script>
        <script src="<?php echo(URL); ?>js/grupo.js"></script>
    </body>

</html>