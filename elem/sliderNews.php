<? $ITEMS = $db->selectHelpP('news');
$id = 1; ?>
<div class=" conteiner sliderNews">

    <h2>Вы помогли им:</h2>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner">
              <? foreach ($ITEMS as $key => $value) :?>             
               <? if(!empty($value['foto1']) && mb_strlen($value["prevText"])< 230) :?>
                    <div class="carousel-item  <?
                  
                     if ($id == 1 ) echo "active";
                     $id++; ?>">
                        <img class="first-slide" src="<?= $value['foto1'] ?>" width="100%" height="400px" alt="First slide">
                        <div class="container">
                            <div class="carousel-caption text-center">
                                <h3><?= $value["prevText"] ?></h3>
                                <p><a class="btn btn-lg btn-primary" href="#" role="button">подробнее</a></p>
                            </div>
                        </div>
                    </div>
              <?endif?>
            <? endforeach ?>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>