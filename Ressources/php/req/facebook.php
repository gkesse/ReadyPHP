<?php
    require $_SERVER["DOCUMENT_ROOT"]."/php/class/GAutoloadRegister.php";	
	//===============================================
	$lReq = $_REQUEST["req"];
	//===============================================
	if($lReq == "FACEBOOK_CONNECT") {
        GFacebook::Instance()->run();
	}
	//===============================================
	else if($lReq == "FACEBOOK_TOKEN") {
        GFacebook::Instance()->token();
	}
	//===============================================
?>
