<?php
    require "GAutoloadRegister.php";
    
    $m_data = GJson::Instance()->getData("/Page_Base/PageEditor.json");
?>
<!-- ============================================ -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>ReadyHTMLEditor</title>
        <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0, user-scalable=no">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<!-- ============================================ -->
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Aclonica"/>
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Akronim"/>
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Allan"/>
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Archivo Narrow"/>
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Anton"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
		<!-- ============================================ -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<!-- ============================================ -->
		<link rel="stylesheet" href="style.css" />
		<script src="editor.js"></script>
		<!-- ============================================ -->
	</head>
	<body onkeypress="saveFileKey(event);">
		<!-- ============================================ -->
		<div class="pgBg">
			<div class="mrga pgBd pdtb">
				<!-- ============================================ -->
				<div class="pgCt10">
					<div class="bgra">
						<h1 class="bgra pgCt20" id="SommairePro">
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
				<div class="pgCt10">
					<div class="brda">
						<h1 class="bgra pgCt20 bdbb" id="Interface_Edition">
							<a class="clrb" href="#SommairePro">
								Interface Edition
							</a>
						</h1>
						<div class="pgCt10 ovfa txal">
							<div class="hghd EditorPage" id="codeEditorId" 
							onpaste="pasteText(event);" 
							contentEditable="true"></div> 
						</div>
						<div class="bdbb"></div>
					</div>
				</div>
				<!-- ============================================ -->
				<div class="pgCt10">
					<div class="brda">
						<h1 class="bgra pgCt20 bdbb" id="Interface_Vue">
							<a class="clrb" href="#SommairePro">
								Interface Vue
							</a>
						</h1>
						<div class="bdbb">
							<button class="evta" type="button" onclick="viewPage();">Aperçu</button>
						</div>
						<div class="pgCt10 ovfa txal">
							<div class="hghd" id="viewPageId"></div>
						</div>
						<div class="bdbb"></div>
					</div>
				</div>
				<!-- ============================================ -->
				<div class="pgCt10">
					<div class="brda">
						<h1 class="bgra pgCt20 bdbb" id="Interface_HTML">
							<a class="clrb" href="#SommairePro">
								Interface HTML
							</a>
						</h1>
						<div class="bdbb">
							<button class="evta" type="button" onclick="viewCode();">Obtenir le HTML</button>
							<button class="evta" type="button" onclick="saveFileText();"><i class="fa fa-save"></i></button>
						</div>
						<div class="ovfa">
							<textarea class="hghd pgCt10" rows="20" id="viewCodeId"></textarea>
						</div>
					</div>
				</div>
				<!-- ============================================ -->
			</div>
			<!-- ============================================ -->
		</div>
		<!-- ============================================ -->
		<div class="psfa bgrh pddc fts0 txac bdbb">
			<button class="evta pddc ftsb ftwb" type="button" title="Texte en Gras" onclick="getCommand('bold');">G</button>
			<button class="evta pddc ftsb ftti" type="button" title="Texte en Italic" onclick="getCommand('italic');">I</button>
			<button class="evta pddc ftsb txdu" type="button" title="Souligner Texte" onclick="getCommand('underline');">S</button> 
			<button class="evta pddc ftsb txdl" type="button" title="Barrer Texte" onclick="getCommand('strikeThrough');">abc</button>
			<button class="evta pddc ftsb" type="button" title="Insérer Lien" onclick="getCommand('createLink');"><i class="fa fa-link"></i></button>		
			<button class="evta pddc ftsb" type="button" title="Supprimer Lien" onclick="getCommand('unlink');"><i class="fa fa-unlink"></i></button>		
			<button class="evta pddc ftsb" type="button" title="Insérer Image" onclick="getCommand('insertImage');"><i class="fa fa-image"></i></button>		
			<button class="evta pddc ftsb" type="button" title="Enregistrer Fichier" onclick="saveFile();"><i class="fa fa-save"></i></button>		
			<button class="evta pddc ftsb" type="button" title="Texte à Gauche" onclick="getCommand('justifyleft');"><i class="fa fa-align-left"></i></button>		
			<button class="evta pddc ftsb" type="button" title="Text au Centre" onclick="getCommand('justifycenter');"><i class="fa fa-align-center"></i></button>		
			<button class="evta pddc ftsb" type="button" title="Texte à Droite" onclick="getCommand('justifyright');"><i class="fa fa-align-right"></i></button>		
			<button class="evta pddc ftsb" type="button" title="Texte Justifié" onclick="getCommand('justifyfull');"><i class="fa fa-align-justify"></i></button>		
			<button class="evta pddc ftsb" type="button" title="Puces" onclick="getCommand('insertunorderedlist');"><i class="fa fa-list"></i></button>		
			<button class="evta pddc ftsb" type="button" title="Puces Ordonnées" onclick="getCommand('insertorderedlist');"><i class="fa fa-list-ol"></i></button>		
			<button class="evta pddc ftsb" type="button" title="Ajouter un Code" onclick="getCommand('code');"><i class="fa fa-code"></i></button>		
			<!-- ============================================ -->
			<select class="brda mnwa mrgd" onchange="getCommand('readystyle', this.value); this.selectedIndex = 0;">
				<option value="">ReadyStyle</option>
				<option value="Title1">Titre 1</option>
				<option value="Title2">Titre 2</option>
				<option value="Title3">Titre 3</option>
				<option value="Summary1">Sommaire 1</option>
				<option value="Summary2">Sommaire 2</option>
				<option value="LineBreak1">Saut de Ligne 1</option>
				<option value="LineBreak2">Saut de Ligne 2</option>
				<option value="LineBreak3">Saut de Ligne 3</option>
				<option value="LineBreak4">Saut de Ligne 4</option>
				<option value="Shift1">Décalage 1</option>
				<option value="Shift2">Décalage 2</option>
				<option value="Code1">Code 1</option>
			</select>
		</div>
		<!-- ============================================ -->
        <script src="GEditor.js"></script>		
		<!-- ============================================ -->
	</body>
</html>
<!-- ============================================ -->
