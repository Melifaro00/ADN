<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>
<body>
        <!--action="auth.php"-->

<?php echo "<b>Исходная База данных (строка):</b> ";
    $f = file_get_contents("userbd.html");
    echo $f;    
    
    echo "<br><br> Разбиваем строку:<br>";    
    $data = ( explode( '|', $f ) );
    
    echo "Количество элементов массива: ";
    $kol=count($data);
    //echo gettype($kol);

    echo "kol="; echo $kol;echo "<br>";
    // 3 - кол-во свойств для одного пользователя    
    $k=$kol/3;    
    
    echo "Кол-во пользователей ";     echo "k="; echo $k; echo "<br>"; 
    $z=0;
    $i=1; 
?>
<h2>Форма входа на сайт</h2>
<p> Содержимое страницы доступно только зарегистрированным пользователям</p>
<p>* Login=test ; password=123;</p>

<form  method="post">
    <input type="text" name="login" placeholder="Login"><br><br>
    <input type="password" name="pass" placeholder="Password"><br><br>
    <input type="submit" name="submit" placeholder="Login"><br>
</form>
<a href="/register.php">Зарегистрироваться</a><br>

<?php
if (isset($_POST['submit']))
{
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    echo "Неправильно введен логин или пароль <br>";
    echo "Ввели с клавиатуры User="; echo $login; echo "<br>";
    echo "Ввели с клавиатуры Password="; echo $pass; echo "<br>";
    while ($i <= $k)
    {
        //Шаг1
        echo "<br>Строка =";  echo $i;  echo "<br>";              
        echo $z ; echo " ID="; echo $data[$z]; echo "<br>";
        $z=$z+1;        
        //Шаг2
        echo $z ; echo " USER="; echo $data[$z]; echo $login;
        if( $login == $data[$z])
        {   echo" Логин совпал.";          
            $z=$z+1;
            if( $pass == $data[$z])
            {
                // перенаправление на нужную страницу
                header ('Location: auth.php');  
                // прерываем работу скрипта, чтобы забыл о прошлом
                exit(); 
            }
            else
            {
                echo" Пароль не совпал.";
            }         
        }  
        else
        {
            echo" Логин не совпал ";
        }     
        $z=$z+1;       
        //Шаг3
        echo "<br>";echo $z; echo " LOGIN="; echo $data[$z];         
        $z=$z+1;        
        echo "<br>"; 
        $id = $data[$z];           
        $i=$i+1;        
    }      
    

    //$logtrue = "test";
    //$passtrue = "123";
    //if($login == $logtrue && $passtrue == $pass )
    //{   // перенаправление на нужную страницу
    //    header ('Location: auth.php');  
        // прерываем работу скрипта, чтобы забыл о прошлом
    //    exit();    
   // }
    //else
    //{
    //    echo "Неправильно введен логин или пароль";
    //}
}
?>
</body></html>