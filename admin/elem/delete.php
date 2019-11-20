<?php
$table = "news";
echo $id = $_GET['delete'];
//$row = $db->selectById($table,$id);
$db->delete($table,$id);
//$_SESSION['headerInfo'] = "Вы удалили   " . $row['description'];
header("location: index.php?news");