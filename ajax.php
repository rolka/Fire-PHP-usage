<?php
include_once('includes/FirePHPCore/fb.php');
ob_start('ob_gzhandler');

FB::info($_GET['str'], 'My AJAX Test');

echo 'My clean AJAX response';

ob_end_flush();
?>