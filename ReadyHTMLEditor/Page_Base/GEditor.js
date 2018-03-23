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
            editTitle: function(arg) {
				if(arg == "") return;
				var m_selection = document.getSelection();
				var m_startNode = m_selection.anchorNode;
				var m_data = m_startNode.data;
				var m_command = '';
				
				switch(arg) {
				case 'h1':
					m_command += '<h1 class="bgra pgCt20" id="Sommaire">';
					m_command += '<a class="clrb" href="#">';
					m_command += m_data;
					m_command += '</a>';
					m_command += '</h1>';
					document.execCommand("insertHTML", false, m_command);
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
// Initialization
//===============================================
//===============================================
