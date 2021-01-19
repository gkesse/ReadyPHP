<?php   
//===============================================
require "./php/class/GAutoload.php";
require "./libs/composer/vendor/autoload.php";
//===============================================
GManager::Instance()->redirectPost();
GProcess::Instance()->run();
//===============================================
?>