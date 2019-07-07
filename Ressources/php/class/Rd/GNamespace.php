<?php 
    namespace Rd;
    //===============================================
    class GNamespace {
        //===============================================
        private static $m_instance = null;
        //===============================================
        private function __construct() {

        }
        //===============================================
        public static function Instance() {
            if(is_null(self::$m_instance)) {
                self::$m_instance = new GNamespace();  
            }
            return self::$m_instance;
        }
        //===============================================
        public function run() {
            echo "Test Namespace : "."<br/>";
            echo "<br/>### __NAMESPACE__ : ". __NAMESPACE__ ."<br/>";
        }
        //===============================================
    }
?>        