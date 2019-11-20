<?
session_start();
// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// header("Cache-Control: no-store, no-cache, must-revalidate");
// header("Expires: " . date("r"));
include_once "class/User.class.php";
include_once "class/Db.class.php";

$user = new User;
$db  = new Db;
$title = "ДАРИ ДОБРО";

//echo  $_SESSION['quantPage']; 

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['pages'])) {
        if( 1 > $_GET['pages'] ||  $_GET['pages'] > $_SESSION['quantPage']){
            $title = "404";
        }else{$title = "НОВОСТИ";}
        
    }
    if (isset($_GET['linkMenu'])) {
        switch ($_GET['linkMenu']) {
            case "oFond":
                $title = "О фонде";
                break;
            case "asHelp":
                $title = "Как помочь";
                break;
            case "whomHelp":
                $title = "Кому помочь";

                break;
            case "news":
                $title = "НОВОСТИ";

                break;
            case "meNeedHelp":
                $title = "Получить помощь";
                break;
            case "helped":
                $title = "Кому помогли";
                break;
                default:
                $title = "404";
        }
    }
  
} else {
    $title = "ДАРИ ДОБРО";
}

if($_GET){
    if(!isset($_GET['linkMenu']) && !isset($_GET['pages'])){
        $title = "404";
    }
}
include_once "elem/layout.php";
