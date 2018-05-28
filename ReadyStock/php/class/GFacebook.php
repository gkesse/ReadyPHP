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
                'app_version' => 'v2.10'
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
            $lFacebook = new \Facebook\Facebook([
                'app_id' => $this->m_params['app_id'],
                'app_secret' => $this->m_params['app_secret'],
                'default_graph_version' => $this->m_params['app_version']
            ]);
            $lResponse = $lFacebook->get('/me');
            var_dump($lResponse);
        }
        //===============================================
    }
?>        