<?php 
    class GConfig {
        //===============================================
        private static $m_instance = null;
        private $m_dataMap = array();
        //===============================================
        private function __construct() {
            $this->setData("PROCESS_TYPE", "NAMESPACE");
        }
        //===============================================
        public static function Instance() {
            if(is_null(self::$m_instance)) {
                self::$m_instance = new GConfig();  
            }
            return self::$m_instance;
        }
        //===============================================
        public function setData($key, $value) {
            $this->m_dataMap[$key] = $value;
        }
        //===============================================
        public function getData($key) {
            return $this->m_dataMap[$key];
        }
        //===============================================
    }
?>        