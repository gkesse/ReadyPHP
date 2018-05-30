<?php
    require $_SERVER["DOCUMENT_ROOT"]."/php/class/GAutoloadRegister.php";	
	//===============================================
    GConfig::Instance()->setData("PROCESS_TYPE", "NAMESPACE");
	//===============================================
	$lReq = $_REQUEST["req"];
	//===============================================
	if($lReq == "PROCESS_RUN") {
		GProcess::Instance()->run();
	}
	//===============================================
?>
