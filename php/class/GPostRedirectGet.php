<?php   
    class GPostRedirectGet {
        //===============================================
        private static $m_instance = null;
        //===============================================
        private function __construct() {
            
        }
        //===============================================
        public static function Instance() {
            if(is_null(self::$m_instance)) {
                self::$m_instance = new GPostRedirectGet();  
            }
            return self::$m_instance;
        }
        //===============================================
        public function redirect() {
            if(!empty($_POST) OR !empty($_FILES))
            {
                $_SESSION["SAVE_POST"] = $_POST ;
                $_SESSION["SAVE_FILES"] = $_FILES ;
                
                $lUrl = $_SERVER["PHP_SELF"] ;

                if(!empty($_SERVER["QUERY_STRING"]))
                {
                    $lUrl .= "?" . $_SERVER["QUERY_STRING"] ;
                }
                header("Location: " . $lUrl);
                exit;
            }
            
            if(isset($_SESSION["SAVE_POST"]))
            {
                $_POST = $_SESSION["SAVE_POST"] ;
                $_FILES = $_SESSION["SAVE_FILES"] ;
                
                unset($_SESSION["SAVE_POST"], $_SESSION["SAVE_FILES"]);
            }
        }
        //===============================================
    }
?>