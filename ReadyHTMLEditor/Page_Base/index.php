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
			<div class="mrga pgBd ftfe ftsg">
				<!-- ============================================ -->
				<div class="pgCt10 txal">
					<div class="">
						<!-- ============================================ -->
						<div class="bgra pddc fts0">
							<button class="evta pddc ftsb ftwb" type="button" onclick="commande('bold');">G</button>
							<button class="evta pddc ftsb ftti" type="button" onclick="commande('italic');">I</button>
							<button class="evta pddc ftsb txdu" type="button" onclick="commande('underline');">S</button> 
							<button class="evta pddc ftsb" type="button" onclick="commande('strikeThrough');">abc</button>
							<button class="evta pddc ftsb" type="button" onclick="commande('createLink');"><i class="fa fa-link"></i></button>		
							<button class="evta pddc ftsb" type="button" onclick="commande('unlink');"><i class="fa fa-unlink"></i></button>		
							<button class="evta pddc ftsb" type="button" onclick="commande('insertImage');"><i class="fa fa-image"></i></button>		
							<button class="evta pddc ftsb" type="button" onclick="saveFile();"><i class="fa fa-save"></i></button>		
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
						<div class="brda mnha pgCt10" id="codeEditorId" contentEditable></div> 
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
				</div>
				<!-- ============================================ -->
			</div>
		</div>
		<!-- ============================================ -->
	</body>
</html>
