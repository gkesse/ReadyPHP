<?php   
    class GFile {
        //===============================================
        private static $m_instance = null;
        //===============================================
        private function __construct() {
        
        }
        //===============================================
        public static function Instance() {
            if(is_null(self::$m_instance)) {
                self::$m_instance = new GFile();  
            }
            return self::$m_instance;
        }
        //===============================================
        public function getPath($path) {
            $lPath = $_SERVER["DOCUMENT_ROOT"]."/".$path;
            return $lPath;
        }
        //===============================================
        public function getData($file) {
            $lFile = $_SERVER["DOCUMENT_ROOT"]."/".$file;
            $lData = file_get_contents($lFile);
            return $lData;
        }
        //===============================================
    }
?>