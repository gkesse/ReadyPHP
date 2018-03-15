<?php
    require "GAutoloadRegister.php";
    
    $m_data = GJson::Instance()->getData("PageEditor.json");
?>
<!-- ============================================ -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>ReadyHTMLEditor</title>
		<!-- ============================================ -->
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Aclonica"/>
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Akronim"/>
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Allan"/>
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Archivo Narrow"/>
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Anton"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="style.css" />
		<script src="editeur.js"></script>
	</head>
	<body>
		<!-- ============================================ -->
		<div class="pgBg">
			<div class="mrga pgBd ftfe ftsg pdtb">
				<!-- ============================================ -->
				<div class="pgCt10" id="Sommaire">
					<div class="brda">
						<h1 class="bgra pgCt10">
							<a class="clrb" href="#">
								Sommaire
							</a>
						</h1>
						<div class="txal pgCt10">
							<ul class="fa-ul">
								<?php 
                            $m_ds = $m_data["summary"];
                            foreach($m_ds as $m_di) {
                            ?>
								<li>
									<i class="fa-li fa fa-book clrg"></i>
									<a class="hvra clrg" href="<?php echo $m_di["link"]; ?>">
										<?php echo $m_di["name"]; ?>
									</a>
								</li>
								<?php } ?>
							</ul>            
						</div>
					</div>
				</div>
				<!-- ============================================ -->
				<div class="pgCt10" id="Interface_Edition">
					<div class="brda">
						<h1 class="bgra pgCt10">
							<a class="clrb" href="#Sommaire">
								Interface Edition
							</a>
						</h1>
						<div class="pgCt10 hghd ovfa">
							<div id="codeEditorId" contentEditable></div> 
						</div>
					</div>
				</div>
				<!-- ============================================ -->
				<div class="pddi">
					<button class="evta" type="button" onclick="codeView();">Aperçu</button>
				</div>
				<div class="mnha pgCt10" id="codeViewId"></div>
				<!-- ============================================ -->
				<!--div class="pddi">
							<button class="evta" type="button" onclick="codeHtml();">Obtenir le HTML</button>
						</div>
						<textarea class="bgra mnha pgCt10" id="codeHtmlId"></textarea-->
				<!-- ============================================ -->
			</div>
			<!-- ============================================ -->
		</div>
		<!-- ============================================ -->
		<div class="psfa bgrh pddc fts0 txac bdbb">
			<button class="evta pddc ftsb ftwb" type="button" title="Texte en Gras" onclick="commande('bold');">G</button>
			<button class="evta pddc ftsb ftti" type="button" title="Texte en Italic" onclick="commande('italic');">I</button>
			<button class="evta pddc ftsb txdu" type="button" title="Souligner Texte" onclick="commande('underline');">S</button> 
			<button class="evta pddc ftsb txdl" type="button" title="Barrer Texte" onclick="commande('strikeThrough');">abc</button>
			<button class="evta pddc ftsb" type="button" title="Insérer Lien" onclick="commande('createLink');"><i class="fa fa-link"></i></button>		
			<button class="evta pddc ftsb" type="button" title="Supprimer Lien" onclick="commande('unlink');"><i class="fa fa-unlink"></i></button>		
			<button class="evta pddc ftsb" type="button" title="Insérer Image" onclick="commande('insertImage');"><i class="fa fa-image"></i></button>		
			<button class="evta pddc ftsb" type="button" title="Enregistrer Fichier" onclick="saveFile();"><i class="fa fa-save"></i></button>		
			<button class="evta pddc ftsb" type="button" title="Texte à Gauche" onclick="commande('justifyleft');"><i class="fa fa-align-left"></i></button>		
			<button class="evta pddc ftsb" type="button" title="Text au Centre" onclick="commande('justifycenter');"><i class="fa fa-align-center"></i></button>		
			<button class="evta pddc ftsb" type="button" title="Texte à Droite" onclick="commande('justifyright');"><i class="fa fa-align-right"></i></button>		
			<button class="evta pddc ftsb" type="button" title="Texte Justifié" onclick="commande('justifyfull');"><i class="fa fa-align-justify"></i></button>		
			<button class="evta pddc ftsb" type="button" title="Puces" onclick="commande('insertunorderedlist');"><i class="fa fa-list"></i></button>		
			<button class="evta pddc ftsb" type="button" title="Puces Ordonnées" onclick="commande('insertorderedlist');"><i class="fa fa-list-ol"></i></button>		
			<button class="evta pddc ftsb" type="button" title="Souligné" onclick="commande('justifyfull');"><i class="fa fa-image"></i></button>		
			<button class="evta pddc ftsb" type="button" title="Souligné" onclick="commande('justifyfull');"><i class="fa fa-image"></i></button>		
			<button class="evta pddc ftsb" type="button" title="Souligné" onclick="commande('justifyfull');"><i class="fa fa-image"></i></button>		
			<!-- ============================================ -->
			<select class="brda mnwa mrgd" onchange="commande('heading', this.value); this.selectedIndex = 0;">
				<option value="">Titre</option>
				<option value="h1">Titre 1</option>
				<option value="h2">Titre 2</option>
				<option value="h3">Titre 3</option>
				<option value="h4">Titre 4</option>
				<option value="h5">Titre 5</option>
				<option value="h6">Titre 6</option>
			</select>
		</div>
		<!-- ============================================ -->
	</body>
</html>
<!-- ============================================ -->
