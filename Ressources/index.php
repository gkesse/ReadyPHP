<?php 
    require $_SERVER["DOCUMENT_ROOT"]."/php/class/GAutoloadRegister.php";
    GConfig::Instance()->setData("PROCESS_TYPE", "ARRAY_MERGES");
    GProcess::Instance()->run();
?>