function commande(nom, argument){
	switch(nom){
	case "createLink":
	case "insertImage":
		argument = prompt("Quelle est l'adresse ?");
		break;
	}
	
	if (typeof argument === 'undefined') {
		argument = '';
	}
	
	switch(nom){
	case "createLinkO":
		var selected = document.getSelection();
		document.execCommand("insertHTML",false,"<a href='"+argument+"'>"+selected+"</a>");
		break;
	default:
		document.execCommand(nom, false, argument);
		break;
	}
}

function codeHtml(){
	var m_codeHtmlId = document.getElementById("codeHtmlId");
	var m_codeEditorId = document.getElementById("codeEditorId");
	m_codeHtmlId.value = m_codeEditorId.innerHTML;
}


function codeView(){
	var m_codeViewId = document.getElementById("codeViewId");
	var m_codeEditorId = document.getElementById("codeEditorId");
	m_codeViewId.innerHTML = m_codeEditorId.innerHTML;
}

function saveFile() {
	var m_codeEditorId = document.getElementById("codeEditorId");
	var m_data = m_codeEditorId.innerHTML;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "ajax.php?r=SAVE_FILE&f=text.php&d=" + m_data, true);
	xmlhttp.send();
}

function readFile() {
	var m_codeEditorId = document.getElementById("codeEditorId");
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("codeEditorId").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "ajax.php?r=READ_FILE&f=text.php", true);
	xmlhttp.send();
}

readFile();
