<?  
$id = $_GET['update'];
$ITEMS = $db->selectById('news', $id);
if (isset($_SERVER['REQUEST_METHOD']) == "POST" and  isset($_POST['submitUpdate'])) {
    $prevText = $user->clear($_POST['prevText']);
    $detailText = $user->clear($_POST['detailText']);
     echo $date = $user->clear($_POST['date']);
    
    $oldDate =  $db->selectFotoId('news', $id);
    $video[0] = $user->clear($_POST['video0']);
    $video[1] = $user->clear($_POST['video1']);
    $fotoUrl = array(
        "0" => "",
        "1" => "",
        "2" => "",
        "3" => "",
    );
    $i = 0;
    $k = 1;
    foreach ($_FILES as $key => $item) {
        if (empty($item["name"])) {
            $fotoUrl[$i]   .=  $oldDate["foto$k"];
        } else {
            $salt = mt_rand(1, 9000);
            $name = $salt . $item['name'];
            $url = "img/";
            $uploadfile = $url . $name;
            if (move_uploaded_file($item["tmp_name"], $uploadfile)) {
                if (!empty($oldDate["foto$k"])) {
                    $nameFile = "../admin/" . $oldDate["foto$k"];
                    $foto = "foto$k";
                    //unlink($nameFile);
                    $db->delFotoUpdateId('news', $foto, $id);
                    $fotoUrl[$i]   .= $uploadfile;
                }
            }
        }
        $i++;
        $k++;
    }
    $db->update("news", $prevText, $detailText, $fotoUrl,$video, $id,$date);
    header("location: index.php?update=$id&updateOк");   
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


    .videoUpdate{

   padding-bottom:20px !important;
    }

    .row{
        #flex-wrap: nowrap;
    }
</style>
<div class="wraple">
    <form enctype="multipart/form-data" method="POST">
        <div class="form-group">
        <? if (isset($_GET['updateOк'])) echo "Новость изменена! <br>";?>
        <div class="row">
            <div class="col">
            <div class="date">
            <label for="exampleInputEmail1">Дата</label><br>
            <input  for="exampleInputEmail1" name="date" value="<?=$db->returnDate($ITEMS['date'])?>"><br></div>
            </div>
        </div>
       
            <? if (!empty($error["prevText"])) : ?>
                <label class="error" for="exampleInputEmail1"><?= $error['prevText'] ?></label><br>
            <? else : ?>
                <label for="exampleInputEmail1">Заголовок новости</label><br>
            <? endif ?>
            <textarea class="form-control text" name="prevText"><?=$ITEMS["prevText"] ?></textarea>
        </div>
        <div class="form-group">
            <? if (!empty($error["prevText"])) : ?>
                <label class="error" for="exampleInputEmail1"><?= $error['prevText'] ?></label><br>
            <? else : ?>
                <label for="inputPassword">Текст новости </label><br>
            <? endif ?>
            <textarea class="form-control .text" name="detailText" id="" rows="3"><?= $ITEMS['detailText'] ?></textarea>
        </div>
        <div class="row videoUpdate ">
        <? for ($i = 0; $i <= 1; $i++) : ?>
            <? if (!empty($ITEMS["video$i"])) : ?>
                        <div class="col">
                        <iframe width="350" height="300" src="https://www.youtube.com/embed/<?=$db->returnIdVideo($ITEMS["video$i"])?>" 
                            frameborder="0"
                             allow="accelerometer; autoplay; encrypted-media; gyroscope; 
        picture-in-picture" allowfullscreen></iframe><br>
        <label for="exampleInputEmail1">ID видео можно удалить </label><br>
               <input type="text" name="video<?=$i?>" class="form-control" placeholder=""
                value="<?="https://www.youtube.com/". $db->returnIdVideo($ITEMS["video$i"]) ?>" id="precwi">
                    </div>
                        <?else:?>
                        <div class="col">
                        <iframe width="350" height="300" src="" frameborder="1"
                             allow="accelerometer; autoplay; encrypted-media; gyroscope; 
        picture-in-picture" allowfullscreen></iframe><br>        
        <label for="exampleInputEmail1">ID видео можно изменить </label><br>
               <input type="text" name="video<?=$i?>" class="form-control" placeholder="что бы добавить видео вставте его id"
                value="" >
                    </div>
                       <? endif;
        endfor; ?>
 </div>
        <div class="row">
            <? if (!empty($ITEMS['foto1'])) : ?>
                <div class="col">
                    <img src="<?= $ITEMS['foto1'] ?>" width="300px" height="400px;" ;>
                    <div class="form-group">
                        <label for="inputPassword">Изменить фото </label><br>
                        <input class="form-control-file" name="foto1" type="file">
                        <a href="?delFoto=foto1 & id=<?= $ITEMS['id'] ?>">удалить фото</a>
                    </div>
                </div><? else : ?>
                <div class="col">
                    <img src="../img/empty.gif" width="300px" height="400px;" ;>
                    <div class="form-group">
                        <label for="inputPassword">Добавить фото </label><br>
                        <input class="form-control-file" name="foto1" type="file">
                    </div>
                </div>
            <? endif ?>
            <? if (!empty($ITEMS['foto2'])) : ?>
                <div class="col">
                    <img src="<?= $ITEMS['foto2'] ?>" width="300px" height="400px" ;>
                    <div class="form-group">
                        <label for="inputPassword">Изменить фото </label><br>
                        <input class="form-control-file" name="foto2" type="file">
                        <a href="?delFoto=foto2 & id=<?= $ITEMS['id'] ?>">удалить фото</a>
                    </div>
                </div><? else : ?>
                <div class="col">
                    <img src="../img/empty.gif" width="300px" height="400px;" ;>
                    <div class="form-group">
                        <label for="inputPassword">Добавить фото </label><br>
                        <input class="form-control-file" name="foto2" type="file">
                    </div>
                </div>
            <? endif ?>
            <? if (!empty($ITEMS['foto3'])) : ?>
                <div class="col">
                    <img src="<?= $ITEMS['foto3'] ?>" width="300px" height="400px" ;>
                    <div class="form-group">
                        <label for="inputPassword">Изменить фото </label><br>
                        <input class="form-control-file" name="foto3" type="file">
                        <a href="?delFoto=foto3 & id=<?= $ITEMS['id'] ?>">удалить фото</a>
                    </div>
                </div>
            <? else : ?>
                <div class="col">
                    <img src="../img/empty.gif" width="300px" height="400px;" ;>
                    <div class="form-group">
                        <label for="inputPassword">Добавить фото </label><br>
                        <input class="form-control-file" name="foto3" type="file">
                    </div>
                </div><? endif ?>
            <? if (!empty($ITEMS['foto4'])) : ?>
                <div class="col">
                    <img src="<?= $ITEMS['foto4'] ?>" width="300px" height="400px" ;>
                    <div class="form-group">
                        <label for="inputPassword">Изменить фото </label><br>
                        <input class="form-control-file" name="foto4" type="file">
                        <a href="?delFoto=foto4 & id=<?= $ITEMS['id'] ?>">удалить фото</a>
                    </div>
                </div>
            <? else : ?>
                <div class="col">
                    <img src="../img/empty.gif" width="300px" height="400px;" ;>
                    <div class="form-group">
                        <label for="inputPassword">Добавить фото </label><br>
                        <input class="form-control-file" name="foto4" type="file">
                    </div>
                </div><? endif ?>
        </div>
        <button type="submit" name="submitUpdate" class="btn btn-secondary ">Изменить</button>
    </form>
</div>