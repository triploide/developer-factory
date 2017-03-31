<?php 
include_once('php/includes/definer.php');
include('php/bootstrap.php');
include('php/checkers/login.checker.php');
$grupos = Doctrine::getTable('Grupo')->findAll();
?>
<!DOCTYPE html>
<html lang="es-ar">
    <head>
        <?php include('tpl/partials/head.tpl'); ?>
        <link rel="stylesheet" type="text/css" href="css/ruleta.css">
        <style type="text/css">
            
        </style>
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
                    <li>Grupos</li>
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
                    <div class="col-xs-12 col-sm-8">
                        <h1 class="page-title">
                            <i class="fa-fw fa fa-users"></i> 
                                Grupos 
                            <span>>  
                                Listado
                            </span>
                        </h1>
                    </div>
                    <div class="col-xs-12 col-sm-4 text-right">
                        <a href="grupo" class="btn btn-sm btn-success" style="margin-top: 12px">
                           <span class="fa fa-plus"></span> Nuevo
                        </a>
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
                                    <h2>Listado de grupos</h2>              
                                </header>
                
                                <!-- widget div-->
                                <div>
                                    <!-- widget content -->
                                    <div class="widget-body no-padding">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div id="chart"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="roulette_container" style="display: none">
                                                    <div class="roulette" style="display:none;"> 
                                                        <?php
                                                            foreach ($grupos as $grupo) {
                                                                foreach ($grupo->integrantes as $integrante) {
                                                                    echo '<p style="display: none" class="opcion" data-grupo="'.$grupo->id.'">'.$integrante->nombre.'</p>';
                                                                }
                                                            }
                                                        ?>
                                                    </div> 
                                                </div>
                                                <div class="btn_container" style="display: none">
                                                    <p>
                                                        <button class="btn btn-large btn-primary start"> START </button>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

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

        <script src="https://d3js.org/d3.v3.min.js" charset="utf-8"></script>

        <script src="js/boxMessage.js"></script>
        <script src="js/Ruleta.js"></script>
        <script src="js/roulette.js"></script>

        <script>
            $(document).ready(function () {
                pageSetUp();
                $('#left-panel li[data-nav="ruleta"]').addClass('active');
            });
            var data = [
                {"label":"Grupo 1",  "value":1,  "id":"1"},
                {"label":"Grupo 2",  "value":1,  "id":"2"},
                {"label":"Grupo 3",  "value":1,  "id":"1"},
                {"label":"Grupo 4",  "value":1,  "id":"2"}
            ];
                
            Ruleta.init(data);

            var option = {
                speed : 10,
                duration : 2,
                stopImageNumber : -1,
                startCallback : function() {
                    console.log('start');
                },
                slowDownCallback : function() {
                    console.log('slowDown');
                },
                stopCallback : function($stopElm) {
                    console.log('stop');
                }
            }
            $('div.roulette').roulette(option);
            $('.start').click(function(){
                $('div.roulette').roulette('start');    
            });
        </script>

    </body>

</html>