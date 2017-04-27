<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<script data-pace-options='{ "restartOnRequestAfter": true }' src="<?php echo(URL) ?>js/plugin/pace/pace.min.js"></script>

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->

<script src="<?php echo(URL) ?>js/libs/jquery-2.1.1.min.js"></script>
<!--
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    if (!window.jQuery) {
        document.write('<script src="<?php echo(URL) ?>js/libs/jquery-2.1.1.min.js"><\/script>');
    }
</script>
-->
<script src="<?php echo(URL) ?>js/libs/jquery-ui-1.10.3.min.js"></script>
<!--
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
    if (!window.jQuery.ui) {
        document.write('<script src="<?php echo(URL) ?>js/libs/jquery-ui-1.10.3.min.js"><\/script>');
    }
</script>
-->

<!-- IMPORTANT: APP CONFIG -->
<script src="<?php echo(URL) ?>js/app.config.js"></script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
<script src="<?php echo(URL) ?>js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

<!-- BOOTSTRAP JS -->
<script src="<?php echo(URL) ?>js/bootstrap/bootstrap.min.js"></script>

<!-- CUSTOM NOTIFICATION -->
<script src="<?php echo(URL) ?>js/notification/SmartNotification.min.js"></script>

<!-- JARVIS WIDGETS -->
<script src="<?php echo(URL) ?>js/smartwidgets/jarvis.widget.min.js"></script>

<!-- EASY PIE CHARTS -->
<script src="<?php echo(URL) ?>js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

<!-- SPARKLINES -->
<script src="<?php echo(URL) ?>js/plugin/sparkline/jquery.sparkline.min.js"></script>

<!-- JQUERY VALIDATE -->
<script src="<?php echo(URL) ?>js/plugin/jquery-validate/jquery.validate.min.js"></script>

<!-- JQUERY MASKED INPUT -->
<script src="<?php echo(URL) ?>js/plugin/masked-input/jquery.maskedinput.min.js"></script>

<!-- JQUERY SELECT2 INPUT -->
<script src="<?php echo(URL) ?>js/plugin/select2/select2.min.js"></script>

<!-- JQUERY UI + Bootstrap Slider -->
<script src="<?php echo(URL) ?>js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

<!-- browser msie issue fix -->
<script src="<?php echo(URL) ?>js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

<!-- FastClick: For mobile devices -->
<script src="<?php echo(URL) ?>js/plugin/fastclick/fastclick.min.js"></script>

<!--[if IE 8]>

<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

<![endif]-->

<!-- MAIN APP JS FILE -->
<script src="<?php echo(URL) ?>js/app.min.js"></script>

<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
<!-- Voice command : plugin -->
<script src="<?php echo(URL) ?>js/speech/voicecommand.min.js"></script>

<!-- SmartChat UI : plugin -->
<script src="<?php echo(URL) ?>js/smart-chat-ui/smart.chat.ui.min.js"></script>
<script src="<?php echo(URL) ?>js/smart-chat-ui/smart.chat.manager.min.js"></script>

<script src="<?php echo(URL) ?>js/plugin/datatables/i18n/spanish.js"></script>

<script>
    function removeAddon() {
        $('img[alt="www.000webhost.com"]').remove();
        console.log('test');
    }
    var intentos = 0;
    var intervalo = setInterval(function () {
        if (++intentos < 10) {
            removeAddon();
        } else {
            clearInterval(intervalo);
        }
    }, 100);
</script>