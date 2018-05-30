<?php 
    class GProcessNamespace extends GProcess {
        //===============================================
        private static $m_instance = null;
        //===============================================
        private function __construct() {

        }
        //===============================================
        public static function Instance() {
            if(is_null(self::$m_instance)) {
                self::$m_instance = new GProcessNamespace();  
            }
            return self::$m_instance;
        }
        //===============================================
        public function run() {
            echo "Je suis Namespace<br/>";
        }
        //===============================================
    }
?>        