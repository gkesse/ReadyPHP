<?php
    require $_SERVER["DOCUMENT_ROOT"]."/php/class/GAutoloadRegister.php";	
	//===============================================
	$lReq = $_REQUEST["req"];
	//===============================================
	if($lReq == "PROCESS_RUN") {
		GProcess::Instance()->run();
	}
	//===============================================
?>
