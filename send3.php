<html>
    <head>
        <title>Форма заявки с сайта</title>
    </head>
<body>    
    <?php //проверяем, существуют ли переменные в массиве POST
        if(!isset($_POST['fio']) and !isset($_POST['email'])){
    ?> 
    <div style="width:400px;">
    <form action="send3.php" method="post">
        
        <div style="min-width:130px; float:left;"> 
            <strong>Имя:</strong>
        </div>
        <div>
            <input type="text" name="fio" MINLENGTH="3" MAXLENGTH="40" placeholder="Укажите ФИО" required><br><br>
        </div>
        <div style="min-width:130px; float:left;"> 
            <strong>E-mail:</strong>
        </div>
        <div>
            <input type="text" name="email" placeholder="Укажите e-mail" required><br><br>
        </div>
        <div style="min-width:130px; float:left;"> 
            <strong>Текст вопроса:</strong>
        </div>
        <div>
            <textarea rows="5" cols="50" required name="message" placeholder="введите текст">
            </textarea>
        </div><br><br>
        <center><input type="submit" value="Отправить"></center>
    </form> 
    </div>
    <?php
        } else {
        //показываем форму
        $fio = $_POST['fio'];
        $email = $_POST['email'];
        $message = $_POST['message'];           

    //mail("на какой адрес отправить", "тема письма", "Сообщение (тело письма)","From: с какого email отправляется письмо \r\n");
    if (mail("Melifaro00@yandex.ru", "Заявка с сайта", 
              "ФИО:".$fio.". E-mail: ".$email ,"From: Melifaro12@mail.ru \r\n"))
        {             
        // Проверки
        // 1. функция преобразует все символы
        $fio = htmlspecialchars($fio);    
        $email = htmlspecialchars($email);
        $message = htmlspecialchars($message);

        // 2. функция декодирует url, если пользователь попытается его добавить в форму
        $fio = urldecode($fio);
        $email = urldecode($email);

        // 3. удалим пробелы с начала и конца строки
        $fio = trim($fio); 
        $email = trim($email);
        $message = trim($message);

        // запись в массив
        $arr[1] = $fio; 
        $arr[2] = $email; 
        $arr[3] = $message;        
               
        echo "<b>Успешно отправлено:</b> <br>";
        echo $arr[1]; echo "<br>";
        echo $arr[2]; echo "<br>";
        echo $arr[3]; echo "<br>";
        echo "<br>";
        
        // Генерация пароля
        // Символы, которые будут использоваться в пароле. 
        $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP"; 
        // Количество символов в пароле. 
        $max=10; 
        // Определяем количество символов в $chars 
        $size=StrLen($chars)-1; 
        // Определяем пустую переменную, в которую и будем записывать символы. 
        $password=null; 
        // Создаём пароль. 
        while($max--) 
        $password.=$chars[rand(0,$size)]; 
        // Выводим созданный пароль. 
        echo "
            <left> Сгенерированный пароль: 
                <font face=verdana color=red size=4>
                    <b>".$password."</b><br><br>
                </font>            
            </left>"; 
        $strarr = serialize($arr); 
        echo "<b>Cериализованный массив:</b>";
        echo $strarr."<br />";         
        echo "<br /> <b>Cериализованный закодированный массив:</b><br />";
        echo base64_encode($strarr);

        echo "<br /><br /> <b>Массив JSON:</b>"; 
        $jarr=json_encode($arr, JSON_UNESCAPED_UNICODE);        
        
        // Открыть текстовый файл ,записать переменные в файл, 
        // открыть файл для чтения и прочитать строку, закрыть.
        $bd = fopen("bdtest.json", "w"); 
        fwrite($bd, $jarr);
        $bd = fopen("bdtest.json", "r");    
        echo fgets($bd);    

        // Открыть текстовый файл ,записать переменные в файл, 
        // открыть файл для чтения и прочитать строку, закрыть.
        $f = fopen("textfile.txt", "w");
        
        echo "<br><br> <b>Записано в файл: textfile.html </b><br>";
        
        fwrite($f, " <b>Ф.И.О:</b> ".$fio." <br>" ); 
        fwrite($f, " <b>Email:</b> ".$email." <br>"); 
        fwrite($f, " <b>Сообщение:</b> ".$message." <br>");         
        fwrite($f, " <b>Пароль:</b> ".$password);                 

        $f = fopen("textfile.html", "r");    
        echo fgets($f);  

        fclose($f);
        fclose($bd);    
        } 
    else { echo "При отправке сообщения возникли ошибки"; }
    }
?>

<style>
    .del { display: none; }
    .del:not(:checked) + label + * { display: none; } 
    /* вид CSS кнопки */
    .del:not(:checked) + label,
    .del:checked + label {
    display: inline-block;
    padding: 2px 10px;
    /*border-radius: 2px;
    color: #fff;
    background: #4e6473;
    cursor: pointer;*/
    }
    /*.del:checked + label {
    background: #e36443;
    }*/
</style> </br>
<ul>
    <li><a href="/FAQ.html">вернуться к справке</a></li>
    <li><a href="/textfile.html">Посмотреть textfile.html</a></li>
    <li><a href="/bdtest.json">Посмотреть bdtest.json</a></li>
</ul>


<?php
// эксперимент - выборка элемента из json
//$jsonString = '
//{                                         
// "orderID": 123,                       
//  "shopperName": "Ваня",            
//  "shopperEmail": "Vano@example.com",
//  "contents": [                           
//    {                                     
//      "productID": 34,                    
//      "productName": "Товар",       
//      "quantity": 2                      
//    },                                    
//    {                                     
//      "productID": 56,                    
//      "productName": "Супер",
//      "quantity": 3                       
//    }                                     
//  ],                                      
//  "orderCompleted": true                  
//}                                         
//';
//$cart = json_decode( $jsonString );
//echo $cart->shopperEmail . "<br>";
//echo $cart->contents[1]->productName . "<br>";

?>
</body>
</html>