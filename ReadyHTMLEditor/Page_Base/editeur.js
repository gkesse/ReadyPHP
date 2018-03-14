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

function resultat(){
	var m_resultat = document.getElementById("resultat");
	var m_editeur = document.getElementById("editeur");
	m_resultat.value = m_editeur.innerHTML;
}