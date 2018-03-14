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
	case "createLink":
	case "insertImage":
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