<?php   
//===============================================
class GFilesystem extends GWidget {
    //===============================================
    public function __construct() {
        
    }
    //===============================================
    // method
    //===============================================
    public function run() {
        $lApp = GManager::Instance()->getData()->app;
        $this->request();
        echo sprintf("<div class='filesystem_id'>\n");
        echo sprintf("<div class='header'>\n");
        echo sprintf("<div class='item'>%s</div>\n", $lApp->filesystem);
        echo sprintf("</div>\n");
        echo sprintf("<div class='body'>\n");
        foreach (new DirectoryIterator($lApp->filesystem) as $lFileInfo) {
            if($lFileInfo->isDot()) {continue;}
            $lFilename = $lFileInfo->getFilename();
            $lIcon = "file-text-o";
            $lReq = "open_file";
            if($lFileInfo->isDir()) {$lIcon = "folder"; $lReq = "open_dir";}
            $lPath = $lApp->filesystem . "/" . $lFilename;
            echo sprintf("<form action='' method='post'>
            <input type='hidden' id='req' name='req' value='%s'/>
            <input type='hidden' id='path' name='path' value='%s'/>
            <button class='file' type='submit'><i class='icon fa fa-%s'></i>
            %s</button></form>\n", $lReq, $lPath, $lIcon, $lFilename);
        }        
        echo sprintf("</div>\n");
        echo sprintf("</div>\n");
    }
    //===============================================
    public function request() {
        $lApp = GManager::Instance()->getData()->app;
        if(isset($_POST["req"])) {
            $lReq = $_POST["req"];
            if($lReq == "open_dir") {
                $lPath = $_POST["path"];
                $lApp->filesystem = $lPath;
            }
        }
    }
    //===============================================
}
//===============================================
?>