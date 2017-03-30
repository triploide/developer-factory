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

            <!-- RIBBON -->
            <div id="ribbon">

                <!-- breadcrumb -->
                <ol class="breadcrumb">
                    <li>Consultas</li>
                    <li>Listado</li>
                </ol>
                <!-- end breadcrumb -->

            </div>
            <!-- END RIBBON -->
            

            <!-- MAIN CONTENT -->
            <div id="content">

                <!-- PAGE HEADER -->
                <div class="row">
                    <!-- col -->
                    <div class="col-xs-12 col-sm-12">
                        <h1 class="page-title">
                            <i class="fa-fw fa fa-comments"></i> 
                                Consultas 
                            <span>>  
                                Listado
                            </span>
                        </h1>
                    </div>
                    <!-- end col -->
                </div>
                <!-- END PAGE HEADER -->

                <!-- widget grid -->
                <section id="widget-grid" class="">
                
                    <!-- row -->
                    <div class="row">
                        
                        <!-- NEW WIDGET START -->
                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            
                            <!-- Widget ID (each widget will need unique ID)-->
                            <div
                                class="jarviswidget"
                                id="wid-id-11"
                                data-widget-editbutton="false" 
                                data-widget-colorbutton="false" 
                                data-widget-togglebutton="false" 
                                data-widget-deletebutton="false" 
                                data-widget-sortable="false"
                                data-widget-fullscreenbutton="false"
                            >

                                <header>
                                    <span class="widget-icon"> <i class="fa fa-list"></i> </span>
                                    <h2>Listado de consultas</h2>              
                                </header>
                
                                <!-- widget div-->
                                <div>
                                    <!-- widget content -->
                                    <div class="widget-body no-padding">
                                        <table id="tableConsultas" class="table table-striped table-bordered table-hover" width="100%">
                                            <thead>                         
                                                <tr>
                                                    <th>Fecha</th>
                                                    <th>Nombre</th>
                                                    <th>Consulta</th>
                                                    <th>Estado</th>
                                                    <th><i class="fa fa-fw fa-cog text-muted hidden-md hidden-sm hidden-xs"></i> Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end widget content -->
                                </div>
                                <!-- end widget div -->
                                
                            </div>
                            <!-- end widget -->
                
                        </article>
                        <!-- WIDGET END -->
                        
                    </div>
                    <!-- end row -->
                
                </section>
                <!-- end widget grid -->

            </div>
            <!-- END MAIN CONTENT -->

        </div>
        <!-- END MAIN PANEL -->

        <?php include('tpl/partials/footer.tpl'); ?>

        <!-- tpls -->
        <?php include('tpl/modals/borrar.tpl'); ?>

        <!--================================================== -->

        <?php include('tpl/partials/javascript.tpl'); ?>

        <!-- PAGE RELATED PLUGIN(S) -->
        <script src="js/plugin/datatables/jquery.dataTables.min.js"></script>
        <script src="js/plugin/datatables/dataTables.colVis.min.js"></script>
        <script src="js/plugin/datatables/dataTables.tableTools.min.js"></script>
        <script src="js/plugin/datatables/dataTables.bootstrap.min.js"></script>
        <script src="js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

        <script src="js/boxMessage.js"></script>
        <script src="js/consultas.js"></script>
    </body>

</html>