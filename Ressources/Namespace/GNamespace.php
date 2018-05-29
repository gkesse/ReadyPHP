<?php 
    namespace ReadyDev;
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
            $lData = "Bonjour tout le monde";
            print_r($lData);
        }
        //===============================================
    }
?>        