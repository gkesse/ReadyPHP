<?php
    require $_SERVER["DOCUMENT_ROOT"]."/php/class/GAutoloadRegister.php";	
	//===============================================
	$lReq = $_REQUEST["req"];
	//===============================================
	if($lReq == "PROCESS_RUN") {
        $lProcess = $_REQUEST["process"];
        GConfig::Instance()->setData("PROCESS_TYPE", $lProcess);
		GProcess::Instance()->run();
	}
	//===============================================
?>
