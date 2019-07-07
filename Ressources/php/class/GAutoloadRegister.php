<?php
    session_start();
    //===============================================
    function GAutoloadRegister($classname) {
        $lFilename = dirname(__FILE__).DIRECTORY_SEPARATOR.$classname.".php";
        if (is_readable($lFilename)) {
            require $lFilename;
        }    
    }       
    //===============================================
    if (version_compare(PHP_VERSION, "5.1.2", ">=")) {
        if (version_compare(PHP_VERSION, "5.3.0", ">=")) {
            spl_autoload_register("GAutoloadRegister", true, true);
        } 
        else {
            spl_autoload_register("GAutoloadRegister");
        }
    } 
    else {
        function __autoload($classname) {
            $lFilename = dirname(__FILE__).DIRECTORY_SEPARATOR.$classname.".php";
            if (is_readable($lFilename)) {
                require $lFilename;
            }    
        }       
    }
    //===============================================
?>
