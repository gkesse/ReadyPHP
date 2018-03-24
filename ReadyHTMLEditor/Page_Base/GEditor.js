//===============================================
// GEditor
//===============================================
var GEditor = (function() {
    //===============================================
    var m_instance;
    //===============================================
    var Container = function() {
        return {
            //===============================================
            editCode: function() {
				var m_selected = '';
				m_selected += '<pre><xmp class="ovfa prettyprint linenums">';
				m_selected += document.getSelection();
				m_selected += '</xmp></pre>';
				document.execCommand("insertHTML",false,m_selected);
            },
            //===============================================
            editImage: function(arg) {
				var m_command = '';
				m_command += '<div class="txal ovfa">';
                m_command += '<img src="';
				m_command += arg;
				m_command += '" alt="Image.png" />';
                m_command += '</div>';
				document.execCommand("insertHTML", false, m_command);
            },
            //===============================================
            editReadyStyle: function(arg) {
				if(arg == "") return;
				var m_selection = document.getSelection();
				var m_startNode = m_selection.anchorNode;
				var m_data = m_startNode.data;
				var m_range = document.createRange();
																
				switch(arg) {
				case 'Title1':
					if(!m_data) return;
					var m_length = m_data.length;
					var m_parentNode = m_startNode.parentNode;
					if(m_parentNode.nodeName == "A") {
						m_parentNode = m_parentNode.parentNode;
						if(m_parentNode.nodeName == "H1") {
							if(m_parentNode.className.includes("Title1")) {
								m_parentNode = m_parentNode.parentNode.parentNode;
								m_range.selectNode(m_parentNode);
								m_selection.addRange(m_range);
								document.execCommand("insertHTML", false, m_data);
								break;
							}
						}
					}
					m_range.setStart(m_startNode, 0);
					m_range.setEnd(m_startNode, m_length);
					m_selection.addRange(m_range);
					var m_command = '';
					m_command += '<div class="pgCt00">';
					m_command += '<div class="bgra">';
					m_command += '<h1 class="bgra pgCt20 txac Title1" id="'+m_data+'">';
					m_command += '<a class="clrb" href="#Sommaire">';
					m_command += m_data;
					m_command += '</a>';
					m_command += '</h1>';
					m_command += '<div class="txal pgCt10">';
					m_command += 'Ajouter un texte ici...';
					m_command += '</div>';
					m_command += '</div>';
					m_command += '</div>';
					document.execCommand("insertHTML", false, m_command);
					break;
					
				case 'Title2':
					if(!m_data) return;
					var m_length = m_data.length;
					var m_parentNode = m_startNode.parentNode;
					if(m_parentNode.nodeName == "A") {
						m_parentNode = m_parentNode.parentNode;
						if(m_parentNode.nodeName == "H2") {
							if(m_parentNode.className.includes("Title2")) {
								m_range.selectNode(m_parentNode);
								m_selection.addRange(m_range);
								document.execCommand("insertHTML", false, m_data);
								break;
							}
						}
					}
					m_parentNode = m_startNode;
					var m_title = m_parentNode.parentNode.previousSibling.firstChild.innerText;
					m_range.setStart(m_startNode, 0);
					m_range.setEnd(m_startNode, m_length);
					m_selection.addRange(m_range);
					var m_command = '';
					m_command += '<h2 class="ftwn Title2" id="'+m_data+'">';
					m_command += '<a class="bgra dibm ftfb ftsg clra pgCt10" href="#'+m_title+'">';
					m_command += m_data;
					m_command += '</a>';
					m_command += '</h2>';
					document.execCommand("insertHTML", false, m_command);
					break;
					
				case 'Title3':
					if(!m_data) return;
					var m_length = m_data.length;
					var m_parentNode = m_startNode.parentNode;
					if(m_parentNode.nodeName == "B") {
						m_range.selectNode(m_parentNode);
						m_selection.addRange(m_range);
						document.execCommand("insertHTML", false, m_data);
						break;
					}
					m_range.setStart(m_startNode, 0);
					m_range.setEnd(m_startNode, m_length);
					m_selection.addRange(m_range);
					var m_command = '';
					m_command += '<b>';
					m_command += m_data;
					m_command += '</b>';
					document.execCommand("insertHTML", false, m_command);
					break;
					
				case 'Summary1':
					if(!m_data) return;
					var m_length = m_data.length;
					var m_parentNode = m_startNode.parentNode;
					if(m_parentNode.nodeName == "A") {
						m_parentNode = m_parentNode.parentNode;
						if(m_parentNode.nodeName == "DIV") {
							if(m_parentNode.className.includes("Summary1")) {
								m_range.selectNode(m_parentNode);
								m_selection.addRange(m_range);
								document.execCommand("insertHTML", false, m_data);
								break;
							}
						}
					}
					m_range.setStart(m_startNode, 0);
					m_range.setEnd(m_startNode, m_length);
					m_selection.addRange(m_range);
					var m_command = '';
					m_command += '<div class="dibm pdlb Summary1">';
					m_command += '<span class="fa fa-book clrg pdra"></span>';
					m_command += '<a class="clrg" href="#'+m_data+'">';
					m_command += m_data;
					m_command += '</a>';
					m_command += '</div>';
					document.execCommand("insertHTML", false, m_command);
					break;
					
				case 'Summary2':
					var m_parentNode = m_startNode;	

					if(m_data) {
						for(var m_parentCount = 0; m_parentCount < 3; m_parentCount++) {
							if(!m_parentNode.parentNode) break;
							m_parentNode = m_parentNode.parentNode;
						}
						
						if(m_parentCount == 3) {
							if(m_parentNode.nodeName == "DIV") {
								if(m_parentNode.className) {
									if(m_parentNode.className.includes("Summary2")) {
										m_range.selectNode(m_parentNode);
										m_selection.addRange(m_range);
										document.execCommand("insertHTML", false, "");
									}
								}
							}
						}
						break;
					}
					
					var m_childNodes = m_parentNode.childNodes;
					var m_childTitles = Array.from(m_childNodes).filter(function(n) {
						if(n.nodeName == "H2") return true;
						return false;
					});
					if(!m_childTitles.length) break;
					var m_command = '';
					m_command += '<div class="dibm Summary2">';
					for(var i = 0; i < m_childTitles.length; i++) {
						var m_child = m_childTitles[i];
						var m_title = m_child.firstChild.innerText
						m_command += '<div class="pdlb">';
						m_command += '<span class="fa fa-book clrg pdra"></span>';
						m_command += '<a class="clrg" href="#'+m_title+'">';
						m_command += m_title;
						m_command += '</a>';
						m_command += '</div>';
					}
					m_command += '</div>';
					document.execCommand("insertHTML", false, m_command);
					break;
					
				case 'LineBreak1':
					var m_parentNode = m_startNode;
					if(!m_data) {
						document.execCommand("insertHTML", false, "<br>");
						break;
					}
					
					while(1) {
						if(m_parentNode.nodeName == "BR") break;
						if(m_parentNode.nextSibling) {
							m_parentNode = m_parentNode.nextSibling;
						}
						else {
							m_parentNode = m_parentNode.parentNode; 
							m_startNode = m_parentNode;
						}
					}
					var m_br = document.createElement("BR");
					m_parentNode.parentNode.insertBefore(m_br, m_startNode.nextSibling);
					break;
					
				case 'LineBreak2':
					var m_parentNode = m_startNode;
					if(!m_data) {
						document.execCommand("insertHTML", false, "<br>");
						break;
					}
					
					while(1) {
						if(m_parentNode.nodeName == "BR") break;
						if(m_parentNode.nextSibling) {
							m_parentNode = m_parentNode.nextSibling;
						}
						else {
							m_parentNode = m_parentNode.parentNode; 
							m_startNode = m_parentNode;
						}
					}
					var m_br = document.createElement("BR");
					m_parentNode.parentNode.insertBefore(m_br, m_startNode);
					break;
					
				case 'LineBreak3':
					var m_parentNode = m_startNode;
					
					while(1) {
						if(m_parentNode.className) {
							if(m_parentNode.className.includes("EditorPage")) break;
						}
						m_startNode = m_parentNode;
						m_parentNode = m_parentNode.parentNode;
					}
					var m_br = document.createElement("BR");
					m_parentNode.insertBefore(m_br, m_startNode.nextSibling);				
					break;
					
				case 'LineBreak4':
					var m_parentNode = m_startNode;
					
					while(1) {
						if(m_parentNode.className) {
							if(m_parentNode.className.includes("EditorPage")) break;
						}
						m_startNode = m_parentNode;
						m_parentNode = m_parentNode.parentNode;
					}
					var m_br = document.createElement("BR");
					m_parentNode.insertBefore(m_br, m_startNode);				
					break;
				}
            },
            //===============================================
            pasteText: function(e) {
				e.preventDefault();
				var m_clipboardData = e.clipboardData || window.clipboardData;
				var m_data = m_clipboardData.getData("text");
				var m_replace = m_data.replace(/\n/g, "<br>");
				document.execCommand("insertHTML",false,m_replace);
            },
            //===============================================
            viewPage: function() {
				var m_viewPageId = document.getElementById("viewPageId");
				var m_codeEditorId = document.getElementById("codeEditorId");
				m_viewPageId.innerHTML = m_codeEditorId.innerHTML;

            },
            //===============================================
            viewCode: function() {
				var m_viewCodeId = document.getElementById("viewCodeId");
				var m_codeEditorId = document.getElementById("codeEditorId");
				m_viewCodeId.value = m_codeEditorId.innerHTML;
            },
            //===============================================
			saveFile: function() {
				var m_codeEditorId = document.getElementById("codeEditorId");
				var m_data = encodeURIComponent(m_codeEditorId.innerHTML);
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.open("POST", "ajax.php?r=SAVE_FILE&f=text.php&d=" + m_data, true);
				xmlhttp.send();
			},
			//===============================================
			saveFileKey: function(e) {
				if (e.code == 'KeyS' && (e.ctrlKey || e.metaKey)) {
					e.preventDefault();
					saveFile();
				}
			},
            //===============================================
			saveFileText: function() {
				var m_res = confirm("Êtes vous sûr de vouloir enregistrer les modifications ?");
				if(!m_res) return;
				var m_viewCodeId = document.getElementById("viewCodeId");
				var m_data = encodeURIComponent(m_viewCodeId.value);
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.open("POST", "ajax.php?r=SAVE_FILE&f=text.php&d=" + m_data, true);
				xmlhttp.send();
			},
			//===============================================
			readFile: function() {
				var m_codeEditorId = document.getElementById("codeEditorId");
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("codeEditorId").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("POST", "ajax.php?r=READ_FILE&f=text.php", true);
				xmlhttp.send();
			}
            //===============================================
        };
    }
    //===============================================
    return {
        Instance: function () {
            if (!m_instance) {
                m_instance = Container();
            }
            
            return m_instance;
        }
    };
    //===============================================
})();
//===============================================
GEditor.Instance().readFile();
//===============================================
