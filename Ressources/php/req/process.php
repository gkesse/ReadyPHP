<?php
    require $_SERVER["DOCUMENT_ROOT"]."/php/class/GAutoloadRegister.php";	
	//===============================================
	$lReq = $_REQUEST["req"];
	//===============================================
	if($lReq == "PROCESS_RUN") {
        GConfig::Instance()->setData("PROCESS_TYPE", "ARRAY_MERGE");
		GProcess::Instance()->run();
	}
	//===============================================
	else if($lReq == "PROCESS_SELECT") {
        $lProcess = $_REQUEST["process"];
        GConfig::Instance()->setData("PROCESS_TYPE", $lProcess);
		GProcess::Instance()->run();
	}
	//===============================================
?>
