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
        echo sprintf("<div class='filesystem_id'>\n");
        echo sprintf("<div class='header'>\n");
        
        echo sprintf("</div>\n");
        echo sprintf("<div class='body'>\n");
        foreach (new DirectoryIterator($lApp->filesystem) as $lFileInfo) {
            if($lFileInfo->isDot()) continue;
            $lFilename = $lFileInfo->getFilename();
            $lIcon = "file-text-o";
            if($lFilename->isDir()) $lIcon = "folder";
            echo sprintf("<div class='file'>
            <i class='icon fa fa-%s'></i> %s</div>\n", $lIcon, $lFilename);
        }        
        echo sprintf("</div>\n");
        echo sprintf("</div>\n");
    }
    //===============================================
}
//===============================================
?>