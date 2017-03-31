<!-- #NAVIGATION -->
<aside id="left-panel">
    <!-- User info -->
    <div class="login-info">
        <span class="text-center">
            <a style="margin-top: 9px">
                <span><?php echo($USUARIO->nombre); ?></span>
            </a> 
        </span>
    </div>
    <!-- end user info -->
    <nav>
        <ul>
            <li data-nav="grupos">
                <a href="/grupos" title="Grupos"><span class="fa fa-users"></span> Grupos</a>
            </li>
            <li data-nav="ruleta">
                <a href="/ruleta" title="Ruleta"><span class="fa fa-random"></span> Ruleta</a>
            </li>
        </ul>
    </nav>
    <span class="minifyme" data-action="minifyMenu"> 
        <i class="fa fa-arrow-circle-left hit"></i> 
    </span>
</aside>
<!-- END NAVIGATION -->