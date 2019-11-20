<?if (isset($_SERVER['REQUEST_METHOD']) == "POST" and  isset($_POST['simbitHelpMee'])) {

if((isset($_POST['phone'])&&$_POST['phone']!="")){ //Проверка отправилось ли наше поля name и не пустые ли они
    $to = 'tsybiin@yandex.com'; //Почта получателя, через запятую можно указать сколько угодно адресов
    $subject = 'i  need Help'; //Загаловок сообщения
    $message = '
            <html>
                <head>
                    <title>" NEEd HELP!!!"</title>
                </head>
                <body>
                    <p>Имя: '.$_POST['name'].'</p>
                    <p>Телефон: '.$_POST['phone'].'</p>                        
                    <p>email: '.$_POST['email'].'</p> 
                    <p> Сообщение: '.$_POST['text'].'</p>                       
                </body>
            </html>'; //Текст нащего сообщения можно использовать HTML теги
    $headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
    
    //header("Location: form.html"); /* Перенаправление браузера */
    $headers .= "From: I NEEd HELP!!! <helpPeople> "; //Наименование и почта отправителя
    if(mail($to, $subject, $message, $headers)){
        echo '<h2 style="color:red;">Ваше сообщение успешно отравлено !!!</h2>';

    }
}
   //header("location: index.php?linkMenu=meNeedHelp");
;
}?>
<form class="helpMeBorder" enctype="multipart/form-data" method="POST">
<div class="row helpmee">
 <div class="form-group col-md ">
 <label for="name"class="h4">Имя</label>
 <input type="text" class="form-control" name="name"  placeholder="введите Имя" required>
 </div>
 <div class="form-group col-md">
 <label for="email" class="h4">Email</label>
 <input type="email" class="form-control" name="email" placeholder="введите email" required>
 </div>
 <div class="form-group col-md">
 <label for="email" class="h4">Телефон</label>
 <input  class="form-control"  name="phone" 
 id="email" placeholder=" введите Телефон" required>
 </div>
 </div>
 <div class="form-group col-12">
 <label for="message"class="h4 ">Сообщение</label>
 <textarea id="message" class="form-control" rows="5" name="text"  placeholder="введите ваше сообщение" required></textarea>
 </div>
 <button type="submit" name="simbitHelpMee" id="form-submit" class="btn-success  btn-block btn-lg  ">Отправить</button>
</form>



