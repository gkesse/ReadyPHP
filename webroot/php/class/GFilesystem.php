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
            echo sprintf("<div class='file'>
            <i class='fa fa-file-text-o'></i>%s</div>\n", $lFilename);
        }        
        echo sprintf("</div>\n");
        echo sprintf("</div>\n");
    }
    //===============================================
}
//===============================================
?>