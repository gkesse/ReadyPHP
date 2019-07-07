<?php 
    //===============================================
    require $_SERVER["DOCUMENT_ROOT"]."/lib/facebook/src/Facebook/autoload.php";
    //===============================================
    use Facebook\Facebook;
    use Facebook\Exceptions\FacebookResponseException;
    use Facebook\Exceptions\FacebookSDKException;
    //===============================================
    class GFacebook {
        //===============================================
        private static $m_instance = null;
        //===============================================
        private function __construct() {

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
            $appId = "174224726598769";
            $appSecret = "d0a7df28bc4b8b76bda3c29d7e94f138";
            $redirectURL = "http://localhost:8822/php/req/facebook.php?req=FACEBOOK_TOKEN";
            $fbPermissions = ['email'];
            
            $fb = new Facebook(array(
                'app_id' => $appId,
                'app_secret' => $appSecret,
                'default_graph_version' => 'v2.10',
            ));
            
            $helper = $fb->getRedirectLoginHelper();

            $loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);
            
            echo '<a href="' . $loginURL . '">Log in with Facebook!</a>';
            
            //echo "<pre>".print_r($loginURL, 1)."</pre>";
        }
        //===============================================
        public function token() {
            $appId = "174224726598769";
            $appSecret = "d0a7df28bc4b8b76bda3c29d7e94f138";
            $redirectURL = "http://localhost:8822/php/req/facebook_cb.php";
            $fbPermissions = ['email'];
            
            $fb = new Facebook(array(
                'app_id' => $appId,
                'app_secret' => $appSecret,
                'default_graph_version' => 'v2.10',
            ));
            
            $helper = $fb->getRedirectLoginHelper();

            try {
                $accessToken = $helper->getAccessToken();
            } catch(Facebook\Exceptions\FacebookResponseException $e) {
                echo 'Graph returned an error: ' . $e->getMessage();
                exit;
            } catch(Facebook\Exceptions\FacebookSDKException $e) {
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }

            if (!isset($accessToken)) {
                if ($helper->getError()) {
                    header('HTTP/1.0 401 Unauthorized');
                    echo "Error: " . $helper->getError() . "\n";
                    echo "Error Code: " . $helper->getErrorCode() . "\n";
                    echo "Error Reason: " . $helper->getErrorReason() . "\n";
                    echo "Error Description: " . $helper->getErrorDescription() . "\n";
                } 
                else {
                    header('HTTP/1.0 400 Bad Request');
                    echo 'Bad request';
                }
                exit;
            }

            // Logged in
            echo '<h3>Access Token</h3>';
            var_dump($accessToken->getValue());

            // The OAuth 2.0 client handler helps us manage access tokens
            $oAuth2Client = $fb->getOAuth2Client();

            // Get the access token metadata from /debug_token
            $tokenMetadata = $oAuth2Client->debugToken($accessToken);
            echo '<h3>Metadata</h3>';
            var_dump($tokenMetadata);

            // Validation (these will throw FacebookSDKException's when they fail)
            $tokenMetadata->validateAppId($config['app_id']);
            // If you know the user ID this access token belongs to, you can validate it here
            //$tokenMetadata->validateUserId('123');
            $tokenMetadata->validateExpiration();

            if (! $accessToken->isLongLived()) {
            // Exchanges a short-lived access token for a long-lived one
            try {
            $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
            exit;
            }

            echo '<h3>Long-lived</h3>';
            var_dump($accessToken->getValue());
            }

            $_SESSION['fb_access_token'] = (string) $accessToken;

            // User is logged in with a long-lived access token.
            // You can redirect them to a members-only page.
            //header('Location: https://example.com/members.php');            
        }
        //===============================================
    }
?>        