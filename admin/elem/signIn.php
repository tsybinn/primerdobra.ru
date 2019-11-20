<?
if (isset($_SERVER['REQUEST_METHOD']) == "POST" and  isset($_POST['submitIn'])){
    $login = $_POST['login'] ;
    $password = $_POST['password'] ;

    if ($login == 'test' && $password == 'test'){

        $_SESSION['auth'] = true;
        header("Location: index.php");
           
        }
}
    ?>

<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->




        <!-- Login Form -->
        <form method="POST">
            <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
            <input  type="password" id="password" class="fadeIn third" name="password" placeholder="password">
            <input type="submit" class="fadeIn fourth" name="submitIn" value="Авторизироваться">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div>

    </div>
</div>