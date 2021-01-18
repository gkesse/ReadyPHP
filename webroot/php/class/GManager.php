<?php   
//===============================================
class GManager {
    //===============================================
    private static $m_instance = null;
    //===============================================
    private $mgr;
    //===============================================
    private function __construct() {
        // manager
        $this->mgr = new sGManager();
        // app
        $this->mgr->app = new sGApp();
        $this->mgr->app->app_name = "SogetekCRM";
        $this->mgr->app->lang = "fr";
        $this->mgr->app->title = $this->mgr->app->app_name;
        $this->mgr->app->google_desc = "";
        $this->mgr->app->debug = &$_SESSION["debug"];
        $this->mgr->app->last_url = &$_SESSION["last_url"];
        $this->mgr->app->sqlite_db_path = "/data/sqlite/config.dat";
        $this->mgr->app->google_fonts = "/libs/google_fonts/1.0.0";
        $this->mgr->app->logo_web = "/data/img/logo_web.png";
        $this->mgr->app->logo_flat = "/data/img/logo_flat.png";
        $this->mgr->app->logo_org = "/data/img/logo_org.png";
    }
    //===============================================
    public static function Instance() {
        if(is_null(self::$m_instance)) {
            self::$m_instance = new GManager();  
        }
        return self::$m_instance;
    }
    //===============================================
    // data
    //===============================================
    public function getData() {
        return $this->mgr;
    }
    //===============================================
    public function showData($data) {
        $lApp = $this->mgr->app;
        $lApp->debug .= sprintf("%s<br>\n", $data);
    }
    //===============================================
    public function loadData() {
        $this->clearDebug();
        $this->getPageId();
        $this->lastUrl();
    }
    //===============================================
    // last_url
    //===============================================
    public function lastUrl() {
        $lApp = $this->mgr->app;
        $lNoLastUrl = array(
        "home/login"
        );
        if(!in_array($lApp->page_id, $lNoLastUrl)) {
            $lApp->last_url = "/".$lApp->page_id;
        }
    }
    //===============================================
    // page
    //===============================================
    public function getPageId() {
        $lApp = $this->mgr->app;
        $lApp->page_id = $_GET["pageid"];
        if($lApp->page_id == "") {
            $lApp->page_id = "home";
        }
    }
    //===============================================
    // map
    //===============================================
    public function getValue($map, $key, $default) {
        return isset($map[$key]) ? $map[$key] : $default;
    }
    //===============================================
    // request
    //===============================================
    public function request() {
        $lReq = $_REQUEST["req"];
        if($lReq == "debug_clear") {$this->clearDebug(); return;}
    }
    //===============================================
    // debug
    //===============================================
    public function clearDebug() {
        $lApp = $this->mgr->app;
        $lApp->debug = "";
    }
    //===============================================
    // font
    //===============================================
    public function loadFont() {
        $lApp = $this->mgr->app;
        $lPath = "";
        $lPath .= $_SERVER["DOCUMENT_ROOT"];
        $lPath .= $lApp->google_fonts;
        $lMap = glob("$lPath/*/*.css");
        $lRootLength = strlen($_SERVER["DOCUMENT_ROOT"]);
        
        for($i = 0; $i < count($lMap); $i++) {
            $lFilename = $lMap[$i];
            $lFile = substr($lFilename, $lRootLength); 
            echo sprintf("<link rel='stylesheet' type='text/css' href='%s'/>\n", $lFile);
        }
    }
    //===============================================
    // redirect
    //===============================================
    public function redirect($url) {
        $lLocation = sprintf("Location: %s", $url);
        header($lLocation);
    }
    //===============================================
    // string
    //===============================================
    public function getWidth($widthMap, $index, $defaultWidth) {
        $lWidthMap = explode(";", $widthMap);
        $lLength = count($lWidthMap);
        if($index >= $lLength) return $defaultWidth;
        $lWidthId = $lWidthMap[$index];
        if(!is_numeric($lWidthId)) return $defaultWidth;
        $lWidth = $lWidthId;
        return $lWidth;
    }    
    //===============================================
}
//===============================================
// struct
//===============================================
class sGManager {
    public $app;
}
//===============================================
class sGApp {
    // app
    public $app_name;
    // page
    public $page_id;
    // lang
    public $lang;
    // title
    public $title;
    // google
    public $google_desc;
    public $google_fonts;
    // debug
    public $debug;
    // last_url
    public $last_url;
    // sqlite
    public $sqlite_db_path;
    // logo
    public $logo_web;
    public $logo_flat;
    public $logo_org;
}
//===============================================
?>