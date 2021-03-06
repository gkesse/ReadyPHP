<?php   
//===============================================
class GHome extends GWidget {
    //===============================================
    public function __construct() {
        
    }
    //===============================================
    // method
    //===============================================
    public function run() {
        echo sprintf("<div class='home_id'>\n");
        GWidget::Create("listbox")->start();
        GWidget::Create("listbox")->addItem("/home/login", "Connexion", "user");
        GWidget::Create("listbox")->addItem("/home/sqlite", "SQLite", "database");
        GWidget::Create("listbox")->addItem("/home/timesheet", "Timesheet", "calendar");
        GWidget::Create("listbox")->addItem("/home/library", "Librairie", "dashboard");
        GWidget::Create("listbox")->addItem("/home/debug", "Debug", "file-text-o");
        GWidget::Create("listbox")->end();
        echo sprintf("</div>\n");
    }
    //===============================================
}
//===============================================
?>