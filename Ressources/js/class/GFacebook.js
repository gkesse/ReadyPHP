//===============================================
var GFacebook = (function() {
    //===============================================
    var m_instance;
    //===============================================
    var Container = function() {
        return {
            //===============================================
            init: function() {
           
			},
            //===============================================
            connectFacebook: function(obj) {
				var lFacebook = document.getElementById("Facebook");
                var lXmlhttp = new XMLHttpRequest();
                lXmlhttp.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        var lData = this.responseText;
						lFacebook.innerHTML = lData;
                    }
                }
                lXmlhttp.open("POST", "/php/req/facebook.php", true);
                lXmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                lXmlhttp.send(
				"req=" + "FACEBOOK_CONNECT"
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
GFacebook.Instance().init();
//===============================================
