<?php   
    abstract class GProcess {
        //===============================================
        private function __construct() {
        
        }
        //===============================================
        public static function Instance() {
            $lKey = GConfig::Instance()->getData("PROCESS");
            if($lKey == "PRINT") return GProcessPrint::Instance();
            if($lKey == "CONFIG") return GProcessConfig::Instance();
            if($lKey == "MATHJAX") return GProcessMathJax::Instance();
            return GProcessPrint::Instance();
        }
        //===============================================
        abstract public function run();
        //===============================================
    }
?>