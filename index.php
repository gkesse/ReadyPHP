<?php
    require $_SERVER["DOCUMENT_ROOT"]."/php/class/GAutoload.php";
    //=================================================
    GPostRedirectGet::Instance()->redirect();
    GProcess::Instance()->run();
    //=================================================
?>
