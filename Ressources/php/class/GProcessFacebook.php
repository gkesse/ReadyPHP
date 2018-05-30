<?php 
    class GProcessFacebook extends GProcess {
        //===============================================
        private static $m_instance = null;
        //===============================================
        private function __construct() {

        }
        //===============================================
        public static function Instance() {
            if(is_null(self::$m_instance)) {
                self::$m_instance = new GProcessFacebook();  
            }
            return self::$m_instance;
        }
        //===============================================
        public function run() {
            echo "Test Facebook"."<br/><br/>";
            
            GPage::Instance()->setPage("/php/facebook.php");
        }
        //===============================================
    }
?>        