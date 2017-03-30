 <!-- RIBBON -->
<div id="ribbon">

    <!-- breadcrumb -->
    <ol class="breadcrumb">
        <li>Consultas</li><li>${accion}</li>
    </ol>
    <!-- /breadcrumb -->

</div>
<!-- /RIBBON -->

 <!-- PUBLICACION -->
<div id="content">

    <!-- row -->
    <div class="row">

        <!-- col -->
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h1 class="page-title txt-color-blueDark">

                <!-- PAGE HEADER -->
                <i class="fa-fw fa fa-comments"></i> 
                Consultas 
                <span>>  
                    vista individual
                </span>
            </h1>
        </div>
        <!-- /col -->

    </div>
    <!-- /row -->

    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-body status">
                    <div class="who clearfix">
                        <h4>${nombre}</h4>
                    </div>
                    <div class="row">
                        <div class="text">
                            <p>${contenido}</p>
                        </div>
                    </div>
                    <div class="links">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-right">
                                    ${fecha} |
                                    <a href="mailto:${email}"><i class="fa fa-envelope"></i> ${email}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /PUBLICACION -->