<!-- #HEADER -->
<header id="header">
    <div id="logo-group">
        <!-- PLACE YOUR LOGO HERE -->
        <span id="logo"> <img src="<?php echo(URL.'admin/'); ?>img/logo.png" alt="SmartAdmin"> </span>
    </div>

    <!-- #TOGGLE LAYOUT BUTTONS -->
    <!-- pulled right: nav area -->
    <div class="pull-right">
        
        <!-- collapse menu button -->
        <div id="hide-menu" class="btn-header pull-right">
            <span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
        </div>
        <!-- end collapse menu -->

        <!-- logout button -->
        <div id="logout" class="btn-header transparent pull-right">
            <span> <a href="/admin/salir"><i class="fa fa-sign-out"></i></a> </span>
        </div>
        <!-- end logout button -->

    </div>
    <!-- end pulled right: nav area -->

</header>
<!-- END HEADER -->