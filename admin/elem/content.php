<? if(isset($_GET['news'])){

include_once "page/news.php";

}
if(isset($_GET['addedNews'])){

    include_once "page/addedNews.php";
 }

 if(isset($_GET['update'])){

    include_once "page/update.php";
 }
 if(isset($_GET['addedNewsVk'])){

    include_once "parsingNewsVk.php";
 }
?>