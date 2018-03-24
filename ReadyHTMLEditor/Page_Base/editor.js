//===============================================
function getCommand(name, arg){
	switch(name){
	case "createLink":
	case "insertImage":
		arg = prompt("Quelle est l'adresse ?");
		break;
	}
	//===============================================
	if (typeof arg === 'undefined') {
		arg = '';
	}
	//===============================================
	switch(name){
	case "code":
		GEditor.Instance().editCode();
		break;
	case "insertImage":
		GEditor.Instance().editImage(arg);
		break;
	case "readystyle":
		GEditor.Instance().editReadyStyle(arg);
		break;
	default:
		document.execCommand(name, false, arg);
		break;
	}
}
//===============================================
function viewCode(){
	GEditor.Instance().viewCode();
}
//===============================================
function viewPage(){
	GEditor.Instance().viewPage();
}
//===============================================
function saveFile() {
	GEditor.Instance().saveFile();
}
//===============================================
function saveFileText() {
	GEditor.Instance().saveFileText();
}
//===============================================
function saveFileKey(e) {
	GEditor.Instance().saveFileKey(e);
}
//===============================================
function pasteText(e) {
	GEditor.Instance().pasteText(e);
}
//===============================================
