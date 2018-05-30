//===============================================
var GProcess = (function() {
    //===============================================
    var m_instance;
    //===============================================
    var Container = function() {
        return {
            //===============================================
            init: function() {
                this.setProcess("NAMESPACE");
			},
            //===============================================
            setProcess: function(process) {
				var lProcessBody = document.getElementById("ProcessBody");
				var lProcessButtons = document.getElementsByClassName("ProcessButton");
                for(var i = 0; i < lProcessButtons.length; i++) {
                    var lProcessButton = lProcessButtons[i];
                    lProcessButton.className = lProcessButton.className.replace(" Active", "");
                    if(lProcessButton.className.includes(process)) {
                        lProcessButton.className += " Active";
                    }
                }
                var lXmlhttp = new XMLHttpRequest();
                lXmlhttp.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        var lData = this.responseText;
						lProcessBody.innerHTML = lData;
                    }
                }
                lXmlhttp.open("POST", "/php/req/process.php", true);
                lXmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                lXmlhttp.send(
				"req=" + "PROCESS_RUN" +
				"&process=" + process
				);
			},
            //===============================================
            runProcess: function(obj, process) {
				var lProcessBody = document.getElementById("ProcessBody");
				var lProcessButtons = document.getElementsByClassName("ProcessButton");
                for(var i = 0; i < lProcessButtons.length; i++) {
                    var lProcessButton = lProcessButtons[i];
                    lProcessButton.className = lProcessButton.className.replace(" Active", "");
                }
                obj.className += " Active";
                var lXmlhttp = new XMLHttpRequest();
                lXmlhttp.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        var lData = this.responseText;
						lProcessBody.innerHTML = lData;
                    }
                }
                lXmlhttp.open("POST", "/php/req/process.php", true);
                lXmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                lXmlhttp.send(
				"req=" + "PROCESS_RUN" +
				"&process=" + process
				);
			},
            //===============================================
            connectFacebook: function(obj) {
                
            }
            //===============================================
        };
    }
    //===============================================
    return {
        Instance: function() {
            if (!m_instance) {
                m_instance = Container();
            }
            return m_instance;
        }
    };
    //===============================================
})();
//===============================================
GProcess.Instance().init();
//===============================================
