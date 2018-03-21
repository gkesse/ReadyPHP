//===============================================
function commande(name, argument){
	switch(name){
	case "createLink":
	case "insertImage":
		argument = prompt("Quelle est l'adresse ?");
		break;
	}

	if (typeof argument === 'undefined') {
		argument = '';
	}

	switch(name){
	case "code":
		GEditor.Instance().editCode();
		break;
	case "insertImage":
		GEditor.Instance().editImage(argument);
		break;
	default:
		document.execCommand(name, false, argument);
		break;
	}
}
//===============================================
function codeHtml(){
	var m_codeHtmlId = document.getElementById("codeHtmlId");
	var m_codeEditorId = document.getElementById("codeEditorId");
	m_codeHtmlId.value = m_codeEditorId.innerHTML;
}
//===============================================
function codeView(){
	var m_codeViewId = document.getElementById("codeViewId");
	var m_codeEditorId = document.getElementById("codeEditorId");
	m_codeViewId.innerHTML = m_codeEditorId.innerHTML;
}
//===============================================
function saveFile() {
	//var m_res = confirm("Êtes vous sûr de vouloir enregistrer les modifications ?");
	//if(m_res == false) return;
	var m_codeEditorId = document.getElementById("codeEditorId");
	var m_data = encodeURIComponent(m_codeEditorId.innerHTML);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST", "ajax.php?r=SAVE_FILE&f=text.php&d=" + m_data, true);
	xmlhttp.send();
}
//===============================================
function saveFileKey(e) {
	if (e.code == 'KeyS' && (e.ctrlKey || e.metaKey)) {
		e.preventDefault();
		saveFile();
	}
};
//===============================================
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
//===============================================
function deleteStyle(e) {
	/*var m_res = confirm("Voulez-vous supprimer le style associé au texte ?");
	if(m_res == false) return;
	e.stopPropagation();
	e.preventDefault();
	var m_clipboardData = e.clipboardData || window.clipboardData;
	var m_data = m_clipboardData.getData("text");
	var m_codeEditorId = document.getElementById("codeEditorId");
	m_codeEditorId.innerHTML += m_data;*/
}
//===============================================
readFile();
//===============================================
