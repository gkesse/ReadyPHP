<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>ReadyHTMLEditor</title>
		<link rel="stylesheet" href="style.css" />
		<script src="editeur.js"></script>
	</head>
	<body>
		<input type="button" value="G" style="font-weight:bold;" onclick="commande('bold');" />
	    <input type="button" value="I" style="font-style:italic;" onclick="commande('italic');" /> 
	    <input type="button" value="S" style="text-decoration:underline;" onclick="commande('underline');" /> 
	    <input type="button" value="abc" style="text-decoration:line-through;" onclick="commande('line-through');" /> 
	    <div id="editeur" contentEditable ></div> 
		<div>
	</body>
</html>
