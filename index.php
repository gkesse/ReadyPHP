<?php
    require $_SERVER["DOCUMENT_ROOT"]."/manager/class/GAutoload.php";
    //=================================================
    GSetting::Instance()->load("data/config/config.txt"); 
    GProcess::Instance()->run();
    //=================================================
?>