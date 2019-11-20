<?
if (!isset($_GET['pages'])) {
    $page = 1;
} else {
    $page = $_GET['pages'];
}
$pageNext = $page + 1;
$pagePrew = $page - 1;
$table = 'news';
$notePages = 3;
$from = ($page - 1) * $notePages;
$order = '';
$pageNext2 =  $pageNext + 1;
$pagePrew2 = $pagePrew - 1;
$ITEMS = $db->select($table, $from, $notePages, $order);
$quantPage =   round($ITEMS[1] / $notePages);
$_SESSION['quantPage'] = $quantPage;

foreach ($ITEMS[0] as  $key => $value) : ?>
    <div class="container news">
        <div class="row">
            <div class="col dateNews">
                <div class="date"><?= $db->returnDate($value['date']) ?></div>
            </div>
        </div>
        <div class="row">
            <div class="col ">
                <h4 class="prevTextNews"><?= $value['prevText'] ?></h4>
            </div>
        </div>
        <div class="row videoNews">
            <? for ($i = 0; $i <= 1; $i++) : ?>
                <? if (!empty($value["video$i"])) : ?>
                    <div class="col-sm ">

                        <iframe width="300" height="400" src=https://www.youtube.com/embed/<?= $db->returnIdVideo($value["video$i"]) ?>>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; 
        picture-in-picture" allowfullscreen></iframe>

                    </div>
            <? endif;
                endfor; ?>
        </div>

        <div class="row">
            <? for ($i = 1; $i <= 4; $i++) : ?>
                <? if (!empty($value["foto$i"])) : ?>
                    <div class="col-sm ">
                        <img class='newsBorder' src="<?= $value["foto$i"] ?>" width="300px" height="400px" ;>
                    </div>
            <? endif;
                endfor; ?>
        </div>
        <div class="row detailTextNews">
            <div class="col-sm">
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
                        <a class="page-link" href="?pages=<?= $quantPage?>">
                            Последняя
                        </a>
                    </li>
                <? endif; ?>
        </ul>
    </nav>

    
</div>