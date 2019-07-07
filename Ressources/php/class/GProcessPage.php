<?php 
    class GProcessPage extends GProcess {
        //===============================================
        private static $m_instance = null;
        //===============================================
        private function __construct() {

        }
        //===============================================
        public static function Instance() {
            if(is_null(self::$m_instance)) {
                self::$m_instance = new GProcessPage();  
            }
            return self::$m_instance;
        }
        //===============================================
        public function run() {
            echo "Test Page"."<br/>";
        }
        //===============================================
    }
?>        