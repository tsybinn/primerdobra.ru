<!doctype html>
<html lang="en">

<head>
<meta name="yandex-verification" content="8a64a0416d06a84e" />
<link rel="shortcut icon" href="img/favicon3.ico" type="image/x-icon">
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <link href="https://fonts.googleapis.com/css?family=Bad+Script|Oranienbaum&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-social.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/style.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href="css/style.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Bad+Script|Oranienbaum&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-social.css">
    <title><?= $title ?></title>
    <meta name="description" content="ДАРИ ДОБРО!!! Сайт помощи людям." />
</head>

<body>
    <div class="wrapple test">
        <header class="header"><? include_once "elem/header.php" ?></header>
        <aside>
            <?
if(!$_GET) {
    include_once "pages/news.php";
} else{
            
            if (isset($_GET["linkMenu"])) {
                switch ($_GET["linkMenu"]) {
                    case "oFond":
                        include_once "pages/oFond.php";
                        break;
                    case "asHelp":
                        include_once "pages/asHelp.php";
                        break;
                    case "news":
                        include_once "pages/news.php";
                        break;
                    case "meNeedHelp":
                        include_once "pages/meNeedHelp.php";
                        break;
                    case "helped":
                        include_once "pages/news.php";
                        break;
                    default:  include "pages/404.php";
                }  
            } 

            if(!isset($_GET['linkMenu']) && !isset($_GET['pages'])){
                include "pages/404.php";
            }
} 
    if (isset($_GET['pages'])) {
        if( 1 > $_GET['pages'] ||  $_GET['pages'] > $_SESSION['quantPage']){
            include "pages/404.php";
        } else{
            include_once "pages/news.php";
        }
    
    }
        include_once "elem/sliderNews.php";      
            ?>
        </aside>
    </div>
    <footer><? include_once "footer.php" ?></footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
        $('.navbar-toggler').on('click', function() {

            $('.wrapple').toggleClass('test');

        });
    </script>
</body>
</html>
