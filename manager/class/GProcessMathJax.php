<?php   
    class GProcessMathJax extends GProcess {
        //===============================================
        private static $m_instance = null;
        //===============================================
        private function __construct() {
        
        }
        //===============================================
        public static function Instance() {
            if(is_null(self::$m_instance)) {
                self::$m_instance = new GProcessMathJax();  
            }
            return self::$m_instance;
        }
        //===============================================
        public function run() {
			GPrint::Instance()->print("[ GMathJax ] Start "); 
            ?>
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8"/>
                    <meta name="viewport" content="width=device-width"/>
                    <title>MathJax example</title>
                    <script type="text/javascript" async
                            src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML" async>
                    </script>
                </head>
                <body>
                    <p>
                        When \(a \ne 0\), there are two solutions to \(ax^2 + bx + c = 0\) and they are
                        $$x = {-b \pm \sqrt{b^2-4ac} \over 2a}.$$
                    </p>
                </body>
            </html>
            <?php
        }
        //===============================================
    }
?>