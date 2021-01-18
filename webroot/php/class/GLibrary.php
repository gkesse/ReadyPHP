<?php   
//===============================================
class GLibrary extends GWidget {
    //===============================================
    public function __construct() {
        
    }
    //===============================================
    // method
    //===============================================
    public function run() {
        echo sprintf("<div class='library_id'>\n");
        GWidget::Create("listbox")->start();
        GWidget::Create("listbox")->addItem("/home/library/phpspreadsheet", "PhpSpreadsheet", "book");
        GWidget::Create("listbox")->addItem("/home/library/dompdf", "DomPdf", "book");
        GWidget::Create("listbox")->addItem("/home/library/jpgraph", "JpGraph", "book");
        GWidget::Create("listbox")->addItem("/home/library/filesystem", "Filesystem", "book");
        GWidget::Create("listbox")->end();
        echo sprintf("</div>\n");
    }
    //===============================================
}
//===============================================
?>