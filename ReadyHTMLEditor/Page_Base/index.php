<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>ReadyHTMLEditor</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="style.css" />
		<script src="editeur.js"></script>
	</head>
	<body>
		<input type="button" value="G" style="font-weight:bold;" onclick="commande('bold');" />
	    <input type="button" value="I" style="font-style:italic;" onclick="commande('italic');" /> 
	    <input type="button" value="S" style="text-decoration:underline;" onclick="commande('underline');" /> 
	    <input type="button" value="abc" style="text-decoration:line-through;" onclick="commande('strikeThrough');" /> 
	    <button type="button" onclick="commande('createLink');"><i class="fa fa-link"></i></button>		
	    <button type="button" onclick="commande('unlink');"><i class="fa fa-unlink"></i></button>		
	    <button type="button" onclick="commande('insertImage');"><i class="fa fa-image"></i></button>		
	    <div id="editeur" contentEditable ></div> 
		<div>
	</body>
</html>
