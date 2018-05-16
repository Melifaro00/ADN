<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> Форма входа на сайт</title>
</head>
<body>
<h2>Форма входа на сайт</h2>
<form  method="post">
    <input type="text" name="login" placeholder="Логин"><br><br>
    <input type="password" name="pass" placeholder="Пароль"><br><br>
    <input type="submit" name="submit" placeholder="Войти"><br>
</form>


<?php 
    // 1|user111|Y0dGemN6RXhNUT09|2|user222|Y0dGemN6SXlNZz09|3|user333|Y0dGemN6TXpNdz09|4|user444|Y0dGemN6UTBOQT09
    //  1|User111|pass111|2|User222|pass222|3|User333|pass333       
    //echo "<b>Исходная База данных (строка):</b> ";
    $f = file_get_contents("userbd.html");
    //$f=serialize($f);
    //echo $f; echo "<br><br>";
    //$f=unserialize($f);
    //echo $f;echo "<br><br>";
  
    $data = ( explode( '|', $f ) ); // Разбиваем строку   
    
    //echo "Количество элементов массива: ";
    $kol=count($data); //echo "kol="; echo $kol;echo "<br>";
    
    //echo "Кол-во пользователей ";
    $k=$kol/3;  // echo "k=";   echo $k;  echo "<br>";     
    $z=0;
    $i=1;  
if (isset($_POST['submit']))
{
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    
    //echo "Ввели с клавиатуры:"; echo " User="; echo $login; echo "<br>"; echo " Password="; echo $pass; echo "<br>";
    while ($i <= $k)
    {
        //Шаг1 ID
        //echo "<br>Строка =";  echo $i;  echo "<br>";              
        //echo $z ; echo " ID="; echo $data[$z]; echo "<br>";
        $z=$z+1;        
        
        //Шаг2 LOGIN
        //echo $z ; echo " USER="; echo $data[$z]; echo $login;
        if( $login == $data[$z])
        {   //echo" Логин совпал.";          
            $z=$z+1;
            //echo " Пароль из базы="; echo $data[$z]; 
            $data[$z]=base64_decode(base64_decode($data[$z])); // взяли пароль из базы и раскодировали
            //echo " Пароль декодирования="; echo $data[$z];
            if( $pass == $data[$z])      // Сравнили с введенным с клавиатуры
            {   
                session_start();
                $_SESSION['login'] = $login;  
                header ('Location: auth.php');  // перенаправление на нужную страницу
                exit();                          
            }
            
            else { //echo " Пароль не совпал.";   
            } 
            $z=$z-1;
        }  
        else {   //echo" Логин не совпал "; 
            }     
        $z=$z+1;            
        //Шаг3 Пароль
        //echo "<br>";echo $z; echo " LOGIN="; echo $data[$z];         
        $z=$z+1;        
        //echo "<br>"; 
        $id = $data[$z];           
        $i=$i+1;        
    }      
}
?>
</body></html>