<?
$id = $_GET['id'];
 $_GET['delFoto'];


$db->deleteFoto('news',$id,$_GET['delFoto']);

header("location: ?update=$id");