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
		var selected = document.getSelection();
		document.execCommand("insertHTML",false,"<a href='"+argument+"'>"+selected+"</a>");
		break;
	default:
		document.execCommand(nom, false, argument);
		break;
	}
}