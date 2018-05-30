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
            echo "Test ArrayMerge"."<br/>";
            
            $lDefaultConfig = array(
                "OS" => "Windows",
                "WEB_LANGUAGE" => "PHP",
                "SERVER" => "WampServer",               
                "DBSM" => "MySQL"              
            );
            $lNewConfig = array(
                "OS" => "Linux",
                "SERVER" => "LAMP",               
            );
            $lConfig = array_merge($lDefaultConfig, $lNewConfig);
            
            echo "<br/>### Default Config"."<br/><br/>";
            echo "<pre>".print_r($lDefaultConfig, true)."</pre>";
            
            echo "<br/>### New Config"."<br/><br/>";
            echo "<pre>".print_r($lNewConfig, true)."</pre>";
            
            echo "<br/>### Merge Config"."<br/><br/>";
            echo "<pre>".print_r($lConfig, true)."</pre>";
        }
        //===============================================
    }
?>        