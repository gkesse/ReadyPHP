<?php   
//===============================================
class GError extends GWidget {
    //===============================================
    public function __construct() {
        
    }
    //===============================================
    // method
    //===============================================
    public function run() {
        echo sprintf("<div class='error_id'>\n");
        echo sprintf("<div><i class='fa fa-exclamation-triangle'></i> Page non trouvée !!!</div>\n");
        echo sprintf("</div>\n");
    }
    //===============================================
}
//===============================================
?>