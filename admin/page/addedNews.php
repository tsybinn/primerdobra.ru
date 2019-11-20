<?

//echo $db->returnIdvideo('https://youtu.be/u0sfaOKdOfE');
$error =  array(
    "prevText"   => "",
    "detailText" => "",
    "foto1"      => "",
    "date"       => "",
);

echo $error["prevText"];
$see = "block";

if (isset($_SERVER['REQUEST_METHOD']) == "POST" and  isset($_POST['submitAddedNews'])) {

    $prevText = $user->clear($_POST['prevText']);
    $detailText = $user->clear($_POST['detailText']);
    $foto1 = $_FILES['foto1']['name'];
    $date =  $user->clear($_POST['date']);
    $video[0] =  $user->clear($_POST['video0']);
    $video[1] =  $user->clear($_POST['video1']);

    if (empty($prevText)) {
        $error['prevText'] = "Введите заголовок новости";
    } 
    if (empty($date)) {
        $error['date'] = "Введите дату новости";
    }   

    $fotoUrl = array();
    foreach ($_FILES as $key => $item) {
        if (!empty($item['name'])) {
            $salt = mt_rand(1, 9000);
            $name = $salt . $item['name'];
            $url = "img/";
            $uploadfile = $url . $name;
            if (move_uploaded_file($item["tmp_name"], $uploadfile)) {
                array_push($fotoUrl, $uploadfile);
                       }
    }
    }
if($db->insert("news",$prevText,$detailText,$fotoUrl,$video,$date))
echo "<p style='color:red'>Новость добавлена</p>";

}
?>

<style>
    .form-group input {
        border: 1px solid grey;
    }
    .error {
        color: red;
    }
    .wraple {
        width: 90%;
    }
    textarea {
        border: 1px solid grey;
    }
</style>
<div class="wraple">
</div>
<form enctype="multipart/form-data" method="POST">
<div class="form-group">
        <? if (!empty($error["prevText"])) : ?>
            <label class="error" for="exampleInputEmail1"><?= $error['date'] ?></label><br>
        <? else : ?>
            <label for="exampleInputEmail1">Дата новости</label><br>
        <? endif ?>
        <input type="text" name="date" class="form-control" placeholder="1.12.2017" id="precwi">
    </div>
    <div class="form-group">
        <? if (!empty($error["prevText"])) : ?>
            <label class="error" for="exampleInputEmail1"><?= $error['prevText'] ?></label><br>
        <? else : ?>
            <label for="exampleInputEmail1">Заголовок новости</label><br>
        <? endif ?>
        <input type="text" name="prevText" class="form-control" placeholder="" id="precwi">
    </div>
    <div class="form-group">
        <? if (!empty($error["prevText"])) : ?>
            <label class="error" for="exampleInputEmail1"><?= $error['detailText'] ?></label><br>
        <? else : ?>
            <label for="inputPassword">Текст новости </label><br>
        <? endif ?>
        <textarea class="form-control" name="detailText" id="" rows="3"></textarea>
    </div>
    <? for($i=0;$i<=1;$i++):?>
    <div class="form-group">
        <label for="inputPassword">Вставте ссылку на видео </label><br>
        <input type="text" name="video<?=$i?>" class="form-control" placeholder="Вставте ссылку видео">
    </div>
   <?endfor?>
    <?for ($i=1;$i<=4;$i++):?>
    <div class="form-group">
        <? if (!empty($error["foto1"])) : ?>
            <label class="error" for="exampleInputEmail1"><?= $error['foto1'] ?></label><br>
        <? else : ?>
            <label for="inputPassword">Загрузите фото </label><br>
        <? endif ?>
        <input class="form-control-file" name="foto<?=$i?>" type="file">
    </div>
    <?endfor?>
    <button type="submit" name="submitAddedNews" class="btn btn-secondary ">Добавить</button>
</form>
</div>