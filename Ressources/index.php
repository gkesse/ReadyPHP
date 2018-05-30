<?php 
    require $_SERVER["DOCUMENT_ROOT"]."/php/class/GAutoloadRegister.php";
    //===============================================
    GConfig::Instance()->setData("PROCESS_TYPE", "ARRAY_MERGE");
    //===============================================
    GPage::Instance()->setPage("/php/header.php");
    GPage::Instance()->setPage("/php/process.php");
    GPage::Instance()->setPage("/php/footer.php");
    //===============================================
?>
