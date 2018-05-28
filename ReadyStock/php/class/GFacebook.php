<?php 
    require $_SERVER["DOCUMENT_ROOT"]."/lib/facebook/src/Facebook/autoload.php";
    //===============================================
    class GFacebook {
        //===============================================
        private static $m_instance = null;
        private $m_params;
        //===============================================
        private function __construct() {
            $this->m_params = array(
                'app_id' => '174224726598769',
                'app_secret' => 'd0a7df28bc4b8b76bda3c29d7e94f138',
                'app_version' => 'v3.0',
                'app_token' => 'a712963dfb2c6bf6d079e714747a4177'
            );
        }
        //===============================================
        public static function Instance() {
            if(is_null(self::$m_instance)) {
                self::$m_instance = new GFacebook();  
            }
            return self::$m_instance;
        }
        //===============================================
        public function run() {
            var_dump($this->m_params);
        }
        //===============================================
    }
?>        