<?php
if (isset($_GET["page"])) {
    $page = $_GET["page"];
    if ($page == "1" || $page == "addemployer") {
    require_once ('pages/employers/add.php');
    }


    if (isset($_GET["page"])) {
        $page = $_GET["page"];
        if ($page == "2" || $page == "addmenu") {
        require_once ('pages/employers/select.php');
        }
    
    } }
if (isset($_GET["page"])) {
    $page = $_GET["page"];
    if ($page == "3" || $page == "addmenu") {
    require_once ('pages/employers/insert11.php');
    }

} 
if (isset($_GET["page"])) {
    $page = $_GET["page"];
    if ($page == "4" || $page == "addmenu") {
    require_once ('pages/employers/select1.php');
    }

} 

?>