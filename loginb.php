<?php
include_once('php/includes/definer.php');
?>
<!DOCTYPE html>
<html lang="es-ar">
    <head>
        <?php include('tpl/partials/head.tpl'); ?>
    </head>

    <body>

        <?php include('tpl/partials/header-login.tpl'); ?>

        <?php //include('tpl/partials/aside-left.tpl'); ?>

        <!-- MAIN PANEL -->
        <div id="" role="main" style="margin-top: 50px">
            <div id="content" class="container">

                <div class="row">
                    <div class="col-md-4 hidden-sm hidden-xs"></div>
                     <div class="col-md-4">
                        <div class="well no-padding">
                            <form action="<?php echo(URL); ?>php/controllers/login.controller.php" method="post" id="login-form" class="smart-form client-form">
                                <header>
                                    Login
                                </header>

                                <fieldset>

                                    <section>
                                        <label class="label">Usuario</label>
                                        <label class="input"> <i class="icon-append fa fa-user"></i>
                                            <input type="text" name="usuario" autofocus>
                                            <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Ingrese su nombre de usuario</b></label>
                                    </section>

                                    <section>
                                        <label class="label">Contraseña</label>
                                        <label class="input"> <i class="icon-append fa fa-lock"></i>
                                            <input type="password" name="pass">
                                            <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Ingrese su contraseña</b> </label>
                                    </section>

                                </fieldset>
                                <footer>
                                    <button type="submit" class="btn btn-primary">
                                        Entrar
                                    </button>
                                </footer>
                            </form>

                        </div>

                    </div>
                    <div class="col-md-4 hidden-sm hidden-xs"></div>
                </div>
            </div>
        </div>
        <!-- END MAIN PANEL -->

        <?php include('tpl/partials/footer.tpl'); ?>

        <!-- tpls -->
        <?php include('tpl/modals/default.tpl'); ?>
        <?php include('tpl/modals/borrar.tpl'); ?>

        <!--================================================== -->

        <?php include('tpl/partials/javascript.tpl'); ?>

    </body>

</html>