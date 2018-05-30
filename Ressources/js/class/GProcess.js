//===============================================
var GProcess = (function() {
    //===============================================
    var m_instance;
    //===============================================
    var Container = function() {
        return {
            //===============================================
            init: function() {
                this.setProcess();
			},
            //===============================================
            setProcess: function() {
				var lProcessBody = document.getElementById("ProcessBody");
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
				"req=" + "PROCESS_RUN"
				);
			},
            //===============================================
            runProcess: function(obj, process) {
				var lProcessBody = document.getElementById("ProcessBody");
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
				"req=" + "PROCESS_SELECT" +
				"&process=" + process
				);
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
