<?php   
    class GString {
        //===============================================
        private static $m_instance = null;
        //===============================================
        private function __construct() {
        
        }
        //===============================================
        public static function Instance() {
            if(is_null(self::$m_instance)) {
                self::$m_instance = new GString();  
            }
            return self::$m_instance;
        }
        //===============================================
        public function toLower($data) {
            return strtolower($data);
        }
        //===============================================
        public function toUpper($data) {
            return strtoupper($data);
        }
        //===============================================
        public function splitCount($data, $sep) {
            $lDataMap = explode($sep, $data);
            return count($lDataMap);
        }
        //===============================================
        public function splitGet($data, $sep, $index) {
            $lDataMap = explode($sep, $data);
            return $lDataMap[$index];
        }
        //===============================================
    }
?>