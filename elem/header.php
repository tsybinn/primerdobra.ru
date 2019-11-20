
     <nav class="navbar    navbar-light or ">


        <a class="navbar-brand logotype" href="index.php"><img class="logo circle " src="img/logo2.jpeg" width="100" height="100"  ></a>
    <a class="navbar-brand motivation " href="#"><h1>ДАРИМ ДОБРО</h1>
<!--        <p>-->
<!--             Мудрый человек однажды сказал: "Забывайте обиды<br>-->
<!--            Но никогда не забывайте доброту" и это поможет нам жить.-->
<!--        </p>-->
    </a>

   <button class="navbar-toggler "  type="button" data-toggle="collapse"
            data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="fulse"
            aria-label="Toggle navigation">
        <span class="textMenu">меню</span> <span class="navbar-toggler-icon  "></span>
       </button>

    <div class="navbar-collapse collapse show gradient-demo  " id="navbarsExample01" style="">
        <ul class="navbar-nav mr-auto mx-auto  ">

            <div class="row">
              <div class="col-md">  <li class="nav-item <? if ($_GET["linkMenu"] == "oFond") echo "active";
                  ?>  ">
                    <a class="nav-link first " href="?linkMenu=oFond">О ФОНДЕ <span class="sr-only">(current)</span></a>
                </li></div>

              <div class="col-md">  <li class="nav-item <? if ($_GET["linkMenu"] == "asHelp") echo "active";
                  ?>">
                    <a class="nav-link" href="?linkMenu=asHelp">КАК ПОМОЧЬ</a>
                </li></div>

               <div class="col-md"> <li class="nav-item <? if ($_GET["linkMenu"] == "news") echo "active"; ?>">



                    <a class="nav-link " href="?linkMenu=news">НОВОСТИ</a>
                </li></div>

               <div class="col-md"> <li class="nav-item <? if ($_GET["linkMenu"] == "helped") echo "active"; ?>">
                    <a class="nav-link " href="?linkMenu=helped">КОМУ ПОМОГЛИ</a>
                </li></div>

               <div class="col-md"> <li class="nav-item <? if ($_GET["linkMenu"] == "meNeedHelp") echo "active"; ?>">
                    <a class="nav-link " href="?linkMenu=meNeedHelp">ПОЛУЧИТЬ ПОМОЩЬ</a>
                </li></div>

            </div>
        </ul>

    </div>
</nav>
