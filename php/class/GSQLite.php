<?php   
    class GSQLite {
        //===============================================
        private static $m_instance = null;
        //===============================================
        private $m_database;
        private $m_defaultView;
        //===============================================
        private function __construct() {
            $this->setDatabase("C:\Users\Admin\Downloads\Programs\ReadyDev\data\sqlite\database.dat");
            $this->setDefaultView(250);
        }
        //===============================================
        public static function Instance() {
            if(is_null(self::$m_instance)) {
                self::$m_instance = new GSQLite();  
            }
            return self::$m_instance;
        }
        //===============================================
        public function setDatabase($database) {
            $this->m_database = $database;
        }
        //===============================================
        public function setDefaultView($defaultView) {
            $this->m_defaultView = $defaultView;
        }
        //===============================================
        public function run($key) {
            $lKey = GString::Instance()->toUpper($key);
            if($lKey == "TABLES_SHOW") $this->run_TABLES_SHOW();
            else if($lKey == "VIEW_INC") $this->run_VIEW_INC();
            else if($lKey == "VIEW_GET") $this->run_VIEW_GET();
            else if($lKey == "VIEW_ADD") $this->run_VIEW_ADD();
            else if($lKey == "VIEW_DELETE") $this->run_VIEW_DELETE();
        }
        //===============================================
        public function connect() {
            $lUrl = "sqlite:$this->m_database";
            $lPdo = new PDO($lUrl);
            $lPdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $lPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $lPdo;
        }
        //===============================================
        public function tablesGet() {
            $lPdo = $this->connect();
            $lResult = $lPdo->query("
                select name from sqlite_master 
                where type='table'
            ");
            $lTableMap = array();
            foreach($lResult as $lRow) {
                $lTable = $lRow["name"];
                array_push($lTableMap, $lTable);
            }
            $lPdo = null;
            return $lTableMap;
        }
        //===============================================
        public function tableColumnGet($table) {
            $lPdo = $this->connect();
            $lResult = $lPdo->query("
                pragma table_info($table)
            ");
            $lColumnMap = array();
            foreach($lResult as $lRow) {
                $lColumn = $lRow["name"];
                array_push($lColumnMap, $lColumn);
            }
            $lPdo = null;
            return $lColumnMap;
        }
        //===============================================
        public function tableDataGet($table) {
            $lPdo = $this->connect();
            $lResult = $lPdo->query("
                select * from $table
            ");
            $lDataMap = array();
            foreach($lResult as $lRow) {
                $lData = array();
                foreach($lRow as $lKey => $lValue) {
                    array_push($lData, $lValue);
                }
                array_push($lDataMap, $lData);
            }
            $lPdo = null;
            return $lDataMap;
        }
        //===============================================
        public function viewCheck($viewKey) {
            $lViewKey = GString::Instance()->toLower($viewKey);
            $lTable = "VIEWS";
            $lCount = 0;
            $lCheck = 0;
            $lPdo = $this->connect();
            $lResult = $lPdo->query("
                select count(*) iCOUNT from $lTable
                where VIEW_KEY='$lViewKey'
            ");
            foreach($lResult as $lRow) {
                $lCount = $lRow["iCOUNT"];
                break;
            }
            $lPdo = null;
            if($lCount >= 1) $lCheck = 1;
            return $lCheck;
        }
        //===============================================
        public function viewInsert($viewKey) {
            $lViewKey = GString::Instance()->toLower($viewKey);
            $lTable = "VIEWS";
            $lPdo = $this->connect();
            $lPdo->query("
                insert into $lTable (VIEW_KEY, VIEW_COUNT)
                values ('$lViewKey', $this->m_defaultView)
            ");
            $lPdo = null;
        }
        //===============================================
        public function viewIncrement($viewKey) {
            $lViewKey = GString::Instance()->toLower($viewKey);
            $lTable = "VIEWS";
            $lPdo = $this->connect();
            $lPdo->query("
                update $lTable 
                set VIEW_COUNT = VIEW_COUNT + 1
                where VIEW_KEY = '$lViewKey'
            ");
            $lPdo = null;
        }
        //===============================================
        public function viewDelete($viewKey) {
            $lTable = "VIEWS";
            $lPdo = $this->connect();
            $lPdo->query("
                delete from $lTable 
                where VIEW_KEY = '$viewKey'
            ");
            $lPdo = null;
        }
        //===============================================
        public function tableColumnSize($table, $i) {
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
                $lTableMap = $this->tablesGet();
                $lHref = "/argv/".$lHref;
                foreach($lTableMap as $lTable) {
                    $lHref .= '/'.$lTable;
                    echo '<a class="Menu2" href="'.$lHref.'">'.$lTable.'</a>';
                }
            }
            else if ($lCount == 3) {
                $lTable = GString::Instance()->splitGet($lHref, "/", 2);
                $lColumnMap = $this->tableColumnGet($lTable);
                $lHtml = "<div>";
                $i = 0;
                foreach($lColumnMap as $lColumn) {              
                    $lSize = $this->tableColumnSize($lTable, $i); $i++;
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
                
                $lDataMap = $this->tableDataGet($lTable);
                foreach($lDataMap as $lRow) {
                    $lHtml = "<div>";
                    $i = 0;
                    foreach($lRow as $lValue) {
                        $lSize = $this->tableColumnSize($lTable, $i); $i++;
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
                $lSize = $this->tableColumnSize($lTable, $i); $i++;
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
                    $lSize = $this->tableColumnSize($lTable, $i); $i++;
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
                $lSize = $this->tableColumnSize($lTable, $i); $i++;
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
                $lSize = $this->tableColumnSize($lTable, $i); $i++;
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
        public function run_VIEW_ADD() {
            $lHref = $_GET["argv"];
            $lCount = GString::Instance()->splitCount($lHref, "/");
            if($lCount == 2) {
                $this->run_VIEW_ADD_VIEW_NAME();
            }
            else if($lCount == 3) {
                $this->run_VIEW_ADD_VALIDATE();
            }
        }
        //===============================================
        public function run_VIEW_ADD_VIEW_NAME() {
            $lHtml = '
            <form action="/argv/SQLITE/VIEW_ADD/VALIDATE" method="post">
                <div class="FieldRow">
                    <label class="Label" for="VIEW_NAME">VIEW_NAME:</label> 
                    <div class="Field"><input type="text" id="VIEW_NAME" name="VIEW_NAME" required/></div> 
                </div>
                <div class="ButtonRow">
                    <button class="Button" type="submit" value="Valider">Valider</button>
                </div>
            </form>
            ';
            echo $lHtml;
        }
        //===============================================
        public function run_VIEW_ADD_VALIDATE() {
            if(isset($_POST["VIEW_NAME"])) $_SESSION["VIEW_NAME"] = $_POST["VIEW_NAME"];
            $lViewKey = $_SESSION["VIEW_NAME"];
            if(!$this->viewCheck($lViewKey)) {$this->viewInsert($lViewKey);}
            else {$this->viewIncrement($lViewKey);}
        }
        //===============================================
        public function run_VIEW_DELETE() {
            $lHref = $_GET["argv"];
            $lCount = GString::Instance()->splitCount($lHref, "/");
            if($lCount == 2) {
                $this->run_VIEW_DELETE_VIEW_NAME();
            }
            else if($lCount == 3) {
                $this->run_VIEW_DELETE_VALIDATE();
            }
        }
        //===============================================
        public function run_VIEW_DELETE_VIEW_NAME() {
            $lHtml = '
            <form action="/argv/SQLITE/VIEW_DELETE/VALIDATE" method="post">
                <div class="FieldRow">
                    <label class="Label" for="VIEW_NAME">VIEW_NAME:</label> 
                    <div class="Field"><input type="text" id="VIEW_NAME" name="VIEW_NAME" required/></div> 
                </div>
                <div class="ButtonRow">
                    <button class="Button" type="submit" value="Valider">Valider</button>
                </div>
            </form>
            ';
            echo $lHtml;
        }
        //===============================================
        public function run_VIEW_DELETE_VALIDATE() {
            if(isset($_POST["VIEW_NAME"])) $_SESSION["VIEW_NAME"] = $_POST["VIEW_NAME"];
            $lViewKey = $_SESSION["VIEW_NAME"];
            $this->viewDelete($lViewKey);
        }
        //===============================================
    }
?>