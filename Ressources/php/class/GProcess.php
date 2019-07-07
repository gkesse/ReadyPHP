<?php 
    abstract class GProcess {
        //===============================================
        abstract public function run();
        //===============================================
        public static function Instance() {
            $lType = GConfig::Instance()->getData("PROCESS_TYPE");
            if($lType == "PAGE") return GProcessPage::Instance();
            if($lType == "NAMESPACE") return GProcessNamespace::Instance();
            if($lType == "ARRAY_MERGE") return GProcessArrayMerge::Instance();
            if($lType == "FACEBOOK") return GProcessFacebook::Instance();
            return GProcessPage::Instance(); 
        }
        //===============================================
    }
?>        