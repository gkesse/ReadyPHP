<?php   
    class GSQLite {
        //===============================================
        private static $m_instance = null;
        //===============================================
        private function __construct() {
        
        }
        //===============================================
        public static function Instance() {
            if(is_null(self::$m_instance)) {
                self::$m_instance = new GSQLite();  
            }
            return self::$m_instance;
        }
        //===============================================
        public function run($key) {
            $lKey = GString::Instance()->toUpper($key);
            if($lKey == "TABLES_SHOW") $this->run_TABLES_SHOW();
            if($lKey == "VIEW_INC") $this->run_VIEW_INC();
            if($lKey == "VIEW_GET") $this->run_VIEW_GET();
        }
        //===============================================
        public function connect() {
            $lDatabase = "C:\Users\Admin\Downloads\Programs\ReadyDev\data\sqlite\database.dat";
            $lUrl = "sqlite:$lDatabase";
            $lPdo = new PDO($lUrl);
            $lPdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $lPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $lPdo;
        }
        //===============================================
        public function getSize($table, $i) {
            $lSize = 100;
            if($table == "VIEWS") {
                $lSizeMap = "200|150";
                $lSize = GString::Instance()->splitGet($lSizeMap, "|", $i);
            }
            return $lSize;
        }
        //===============================================
        public function run_TABLES_SHOW() {
            $lHref = $_GET["argv"];
            $lCount = GString::Instance()->splitCount($lHref, "/");
            if($lCount == 2) {
                $lPdo = $this->connect();
                $lResult = $lPdo->query("
                    select name from sqlite_master 
                    where type='table'
                ");
                $lHref = "/argv/".$lHref;
                foreach($lResult as $lRow) {
                    $lTable = $lRow["name"];
                    $lHref .= '/'.$lTable;
                    echo '<a class="Menu2" href="'.$lHref.'">'.$lTable.'</a>';
                }
            }
            else if ($lCount == 3) {
                $lTable = GString::Instance()->splitGet($lHref, "/", 2);
                $lPdo = $this->connect();
                $lResult = $lPdo->query("
                    pragma table_info($lTable)
                ");
                $lHtml = "<div>";
                $i = 0;
                foreach($lResult as $lRow) {
                    $lColumn = $lRow["name"];
                    $lSize = $this->getSize($lTable, $i); $i++;
                    $lHtml .= "
                    <div style='
                        display: inline-block;
                        border: 1px solid rgba(255,255,255,0.5);
                        min-width: ".$lSize."px;
                        padding: 5px;
                        background: rgba(1,1,1,0.7);
                    '>$lColumn</div>
                    ";
                }
                $lHtml .= "<div>";
                echo $lHtml;
                $lResult = $lPdo->query("
                    select * from $lTable
                ");
                foreach($lResult as $lRow) {
                    $lHtml = "<div>";
                    $i = 0;
                    foreach($lRow as $lKey => $lValue) {
                        $lSize = $this->getSize($lTable, $i); $i++;
                        $lHtml .= "
                        <div style='
                            display: inline-block;
                            border: 1px solid rgba(255,255,255,0.5);
                            border-top-color: transparent;
                            min-width: ".$lSize."px;
                            padding: 5px;
                        '>".$lValue."</div>
                        ";
                    }
                    $lHtml .= "<div>";
                    echo $lHtml;
                }
            }
            $lPdo = null;
        }
        //===============================================
        public function run_VIEW_INC() {
            $lTable = "VIEWS";
            $VIEW_KEY = "accueil";
            $lPdo = $this->connect();
            $lResult = $lPdo->query("
                update $lTable
                set VIEW_COUNT=VIEW_COUNT + 1
                where VIEW_KEY='$VIEW_KEY'
            ");
            $lHeaders = array("VIEW_KEY", "VIEW_COUNT");
            $lHtml = "<div>";
            for($i = 0; $i < count($lHeaders);) {
                $lColumn = $lHeaders[$i];
                $lSize = $this->getSize($lTable, $i); $i++;
                $lHtml .= "
                <div style='
                    display: inline-block;
                    border: 1px solid rgba(255,255,255,0.5);
                    min-width: ".$lSize."px;
                    padding: 5px;
                    background: rgba(1,1,1,0.7);
                '>$lColumn</div>
                ";
            }
            $lHtml .= "<div>";
            echo $lHtml;
            $lResult = $lPdo->query("
                select * from VIEWS 
                where VIEW_KEY='$VIEW_KEY'
            ");
            foreach($lResult as $lRow) {
                $lHtml = "<div>";
                $i = 0;
                foreach($lRow as $lKey => $lValue) {
                    $lSize = $this->getSize($lTable, $i); $i++;
                    $lHtml .= "
                    <div style='
                        display: inline-block;
                        border: 1px solid rgba(255,255,255,0.5);
                        border-top-color: transparent;
                        min-width: ".$lSize."px;
                        padding: 5px;
                    '>".$lValue."</div>
                    ";
                }
                $lHtml .= "<div>";
                echo $lHtml;
            }
            $lPdo = null;
        }
        //===============================================
        public function run_VIEW_GET() {
            $lTable = "VIEWS";
            $VIEW_KEY = "accueil";
            $VIEW_COUNT = 0;
            //
            $lHeaders = array("VIEW_KEY", "VIEW_COUNT");
            $lHtml = "<div>";
            for($i = 0; $i < count($lHeaders);) {
                $lColumn = $lHeaders[$i];
                $lSize = $this->getSize($lTable, $i); $i++;
                $lHtml .= "
                <div style='
                    display: inline-block;
                    border: 1px solid rgba(255,255,255,0.5);
                    min-width: ".$lSize."px;
                    padding: 5px;
                    background: rgba(1,1,1,0.7);
                '>$lColumn</div>
                ";
            }
            $lHtml .= "<div>";
            echo $lHtml;
            //
            $lPdo = $this->connect();
            $lResult = $lPdo->query("
                select VIEW_COUNT from $lTable
                where VIEW_KEY='$VIEW_KEY'
            ");
            foreach($lResult as $lRow) {
                $VIEW_COUNT = $lRow["VIEW_COUNT"];
                break;
            }
            $lHeaders = array($VIEW_KEY, $VIEW_COUNT);
            $lHtml = "<div>";
            for($i = 0; $i < count($lHeaders);) {
                $lColumn = $lHeaders[$i];
                $lSize = $this->getSize($lTable, $i); $i++;
                $lHtml .= "
                <div style='
                    display: inline-block;
                    border: 1px solid rgba(255,255,255,0.5);
                    border-top-color: transparent;
                    min-width: ".$lSize."px;
                    padding: 5px;
                '>$lColumn</div>
                ";
            }
            $lHtml .= "<div>";
            echo $lHtml;
            $lPdo = null;
        }
        //===============================================
    }
?>