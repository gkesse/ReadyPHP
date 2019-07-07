<?php 
    class GPage {
        //===============================================
        private static $m_instance = null;
        //===============================================
        private function __construct() {

        }
        //===============================================
        public static function Instance() {
            if(is_null(self::$m_instance)) {
                self::$m_instance = new GPage();  
            }
            return self::$m_instance;
        }
        //===============================================
        public function setPage($page) {
            require $_SERVER["DOCUMENT_ROOT"].$page;
        }
        //===============================================
    }
?>        