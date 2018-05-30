<?php 
    class GProcessArrayMerge extends GProcess {
        //===============================================
        private static $m_instance = null;
        //===============================================
        private function __construct() {

        }
        //===============================================
        public static function Instance() {
            if(is_null(self::$m_instance)) {
                self::$m_instance = new GProcessArrayMerge();  
            }
            return self::$m_instance;
        }
        //===============================================
        public function run() {
            echo "Je suis ArrayMerge<br/>";
        }
        //===============================================
    }
?>        