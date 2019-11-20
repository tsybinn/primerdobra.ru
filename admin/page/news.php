<style>
    .container {
        width: 100%;
        border: 1px solid;
    }
    .detailText {
        font-size: 18px;
    }
    .control .col a {
        font-size: 20px !important;
        color: red;
        display: block;
        width: 300px;
        margin: 0 auto;
    }
</style>
<ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
        <div class="row">
            <div class="col">
                <a class="nav-link" href="?addedNews">Добавить новость</a>
            </div>
            <div class="col">
                <a class="nav-link" href="?addedNewsVk">Добавить новости из группы в контакте </a>
            </div>
        </div>
</ul>
<?
if (!isset($_GET['pages'])) {
    $page = 1;
} else {
    $page = $_GET['pages'];
}
$pageNext = $page + 1;
$pagePrew = $page - 1;
$table = 'news';
$notePages = 5;
$from = ($page - 1) * $notePages;
$order = 'DESC';
$pageNext2 =  $pageNext + 1;
$pagePrew2 = $pagePrew - 1;
$ITEMS = $db->select($table, $from, $notePages, $order);
$quantPage = round($ITEMS[1] / $notePages);
//$ITEMS = $db->selectHelpP('news');
//echo "<pre>";
// var_dump($ITEMS[0]);
foreach ($ITEMS[0] as  $key => $value) : ?>
    <div class="container">
        <div class="row control">
            <div class="col">
                <a href="?delete=<?= $value['id'] ?>">удалить новость</a>
            </div>
            <div class="col">
                <a href="?update=<?= $value['id'] ?>">изменить новость</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="date"><?=$db->returnDate($value['date']) ?></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h4><?= $value['prevText'] ?></h4>
            </div>
        </div>
        <div class="row videoUpdate ">
            <? for ($i = 0; $i <= 1; $i++) : ?>
                <? if (!empty($value["video$i"])) : ?>
                    <div class="col">
                        <iframe width="350" height="300" src="https://www.youtube.com/embed/<?= $db->returnIdVideo($value["video$i"]) ?>" 
                            frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; 
        picture-in-picture" allowfullscreen></iframe><br>
                    </div>
                <? else : ?>
              
            <? endif;
                endfor; ?>
        </div>
        <div class="row">
            <? for ($i = 1; $i <= 4; $i++) : ?>
                <? if (!empty($value["foto$i"])) : ?>
                    <div class="col">
                        <img src="<?= $value["foto$i"] ?>" width="300px" height="400px" ;>
                    </div>
            <? endif;
                endfor; ?>
        </div>
        <div class="row">
            <div class="col">
                <p class="detailText"><?= $value['detailText'] ?></p>
            </div>
        </div>
    </div>
<? endforeach ?>

<div class="container pagin">
    <nav>
        <ul class="pagination">
            <? if ($page != 1) : ?>
                <li class="page-item ">
                    <a class="page-link" href="?pages=1">
                        Первая
                    </a>
                </li>
                <li class="page-item <? if ($page == 1) echo "disabled" ?> ">
                    <a class="page-link" href="?pages=<?= $pagePrew ?>" aria-label="Предыдущая">
                        <span aria-hidden="true">«</span>
                        <span class="sr-only">Предыдущая</span>
                    </a>
                </li>
                <? if ($page != 2) : ?>
                    <li class="page-item ?>">
                        <a class="page-link" href="?pages=<? echo "$pagePrew2\">$pagePrew2"; ?></a>
    </li>
    <? endif ?>
<li class=" page-item ">
                    <a class=" page-link" href="?pages=<? echo "$pagePrew\">$pagePrew"; ?></a>
    </li>
    <? endif; ?>

<li class=" page-item active">
                     <a class="page-link" href="?pages=<? echo "$page\">$page"; ?></a>
    </li>
    <? if ($page != $quantPage) : ?>
<li class=" page-item">
                    <a class="page-link" href="?pages=<? echo "$pageNext\">$pageNext"; ?></a>
    </li>
    <? if ($page != $quantPage - 1) : ?>
    <li class=" page-item ">
     <a class=" page-link" href="?pages=<? echo "$pageNext2\">$pageNext2"; ?></a>
    </li>    
    <? endif; ?>    
     <li class=" page-item">
                    <a class=" page-link" href="?pages=<?= $pageNext; ?>" aria-label="Следующая">
                            <span aria-hidden="true">»</span>
                            <span class="sr-only">Следующая</span>
                    </a>
     </li>
                    <li class="page-item">
                        <a class="page-link" href="?pages=<?= $quantPage ?>">
                            Последняя
                        </a>
                    </li>
                <? endif; ?>
        </ul>
    </nav>
</div>