<?php   
    class GProcess {
        //===============================================
        private static $m_instance = null;
        private $m_key = "";
        //===============================================
        private function __construct() {
        
        }
        //===============================================
        public static function Instance() {
            if(is_null(self::$m_instance)) {
                self::$m_instance = new GProcess();  
            }
            return self::$m_instance;
        }
        //===============================================
        public function run() {
            if(!isset($_GET["argv"])) {
                $lTitle = "Menu principal";
                $lLink = "<a href='/'>".$lTitle."</a>";
                $this->menu("", 0, $lLink);
            }
            else if($_GET["argv"] == "") {
                $lTitle = "Menu principal";
                $lLink = "<a href='/'>".$lTitle."</a>";
                $this->menu("", 0, $lLink);
            }
            else {
                $lTitle = $_GET["argv"];
                $lCount = GString::Instance()->splitCount($lTitle, "/");
                $lHref = "/argv/";
                $lLink = "";
                for($i = 0; $i < $lCount; $i++) {
                    if($i != 0) {
                        $lLink .= " <i class='fa fa-chevron-right'></i> ";
                        $lHref .= "/";
                    }
                    $lItem = GString::Instance()->splitGet($lTitle, "/", $i);
                    $lHref .= $lItem;
                    $lLink .= "<a href='".$lHref."'>".$lItem."</a>";
                }
                $this->menu($lTitle, $lCount, $lLink);
            }
        }
        //===============================================
        public function menu($lTitle, $lCount, $lLink) {
            ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP | ReadyDev</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.1.1/pdfobject.min.js"></script>
    <link rel="stylesheet" href="/libs/font_awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/css/style.php"/>
</head>
<body>
    <div style="
        padding: 50px;
    ">
        <div style="
            background-color: rgba(1,1,1,0.2);
            border: 1px solid rgba(255,255,255,0);
            min-height: 500px;
        ">
        <?php
            $lMenuTitle = "Menu principal";
            $lMenuKey = "menu";
            $lAddressUp = 0;
            if($lTitle != "") {
                $lMenuTitle = $lTitle;
                $lMenuKey = GString::Instance()->toLower($lTitle);
                $lAddressUp = 1;
            }
        ?>
        <div style="
            border-bottom: 1px solid rgba(255,255,255,0.9);
            padding: 10px;
        ">
            <a style="
                left: 10px;
                top: 10px;
            " href="/"><i class="fa fa-home"></i></a>
            <?php if($lAddressUp == 1) { ?>
            <i class="fa fa-chevron-right"></i>
            <?php } ?>
            <?php echo $lLink; ?>
        </div>
        <div style="
            font-size: 0px;
            padding: 5px;
        ">
            <?php 
                if($lCount >= 2) {$this->menuRun($lTitle);}
                else {$this->menuMap($lMenuKey);}
            ?>
        </div>
        </div>
    </div>
</body>
</html>
            <?php
        }
        //===============================================
        public function menuMap($lMenuKey) {
            $lMenuJson = GJson::Instance()->getData("data/json/menu.json");
            $lMenuMap = $lMenuJson[$lMenuKey];
            for($i = 0; $i < count($lMenuMap); $i++) { 
            $lMenu = $lMenuMap[$i]; 
            ?>
            <div class="Menu">
                <a class="Menu2" href="<?php echo $lMenu["link"]; ?>"><?php echo $lMenu["name"]; ?></a>
            </div>
            <?php }
        }
        //===============================================
        public function menuRun($lTitle) {
            $lKey = GString::Instance()->splitGet($lTitle, "/", 0);
            $lAction = GString::Instance()->splitGet($lTitle, "/", 1);
            $lKey = GString::Instance()->toUpper($lKey);
            echo '<div class="Menu">';
            if($lKey == "SQLITE") GSQLite::Instance()->run($lAction);
            echo '</div>';
        }
        //===============================================
    }
?>