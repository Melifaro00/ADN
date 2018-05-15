<?php 
    // Открыть файл для чтения и прочитать строку
    echo "База даных: ";
    $f = fopen("userbd.html", "r");
    echo fgets($f); 
    echo "<BR>";
?>
<?php   // Страница регситрации нового пользователя        
        //  echo gettype($login); 
        // 1|User123|pass123|2|User456|pass456|3|User789|pass789
        // 1|User111|pass111|2|User222|pass222|3|User333|pass333
        // 1|User111|pass111|2|User222|pass222|3|User333|pass333|4|User444|pass444|5|User555|pass555
 
if(isset($_POST['test'])) 
{
    // Очистка БД
    $f = fopen("userbd.html", "w");
    fwrite($f, "1|User111|pass111|2|User222|pass222|3|User333|pass333"); 
    
    //echo "<b>База данных:</b> ";
    $f = fopen("userbd.html", "r");
    echo fgets($f); 
}    
if(isset($_POST['clear'])) 
{
    // Очистка БД
	$f = fopen("userbd.html", "w");
    fwrite($f, ""); 
    
    //echo "<b>База данных:</b> ";
    $f = fopen("userbd.html", "r");
	echo fgets($f); 
}
if(isset($_POST['submit'])) 
{
    $err = array();
    //Проверки:
    # 1. Проверям логин
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
    { 
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }
    if(strlen($_POST['login']) < 6 or strlen($_POST['login']) > 30)  
    {
        $err[] = "Логин должен быть не меньше 6-х символов и не больше 30";
    }
    if(strlen($_POST['password']) < 6 or strlen($_POST['password']) > 30)  
    {
        $err[] = "Пароль должен быть не меньше 6-х символов и не больше 30";
    }
    # 2. проверяем, не сущестует ли пользователя с таким именем
    // функция file_get_contents - позволяет произвести чтение файла в строку
    
    echo "<b>Исходная База данных (строка):</b> ";
    $f = file_get_contents("userbd.html");     
    echo $f; echo "<br><br> Разбиваем строку:<br>";    
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
    $user = $_POST['login'];
    echo "Ввели с клавиатуры User=";    echo $user; echo "<br>";
    
    while ($i <= $k)
    {
        //Шаг1
        echo "<br>Строка =";  echo $i;  echo "<br>";              
        echo $z ; echo " ID="; echo $data[$z]; echo "<br>";
        $z=$z+1;        
        //Шаг2
        echo $z ; echo " USER="; echo $data[$z]; $login = $data[$z] ; $z=$z+1;        
        if( $login == $user)
        {  
            echo " Пользователь с именем ". $user. " уже существует: ";        
        }
        //Шаг3
        echo "<br>";echo $z; echo " LOGIN="; echo $data[$z];         
        $z=$z+1;
        $login = $data[$z];
        echo "<br>"; 
        $id = $data[$z];           
        $i=$i+1;
    }      
    if( $login == $_POST['login'])
    {
        $err[] = "Пользователь с таким именем". $login. "уже существует: <br>";        
    }
    # 3. Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)  {         
        $login = $_POST['login'];       

        // Открыть текстовый файл
        $f = "userbd.html";
        // Записать текст
        //fwrite($f, $_POST['login'] );       
         
        //file_put_contents(куда пишем, что пишем); 3-й параметр FILE_APPEND
        // чтобы повторные вызовы file_put_contents не удаляли содержимое файла,         
        $k=$k+1;
        file_put_contents($f, "|".$k, FILE_APPEND);
        file_put_contents($f, "|".$login, FILE_APPEND);
        
        # Убираем лишние пробелы и делаем двойное шифрование
        $password = trim($_POST['password']);   
        //$password = md5(md5(trim($_POST['password']));   
        file_put_contents($f, "|".$password, FILE_APPEND);

        echo "<br>Новый пользователь успешно создан: <br>";
        echo "Логин: ";           echo  $login;  
        echo " <br>Ваш пароль: "; echo  $password;
        
        //echo "<br><b>База данных на выходе:</b> ";
        //$f = fopen("userbd.html", "r");
	    //echo fgets($f); 
    }
    else    
    {
        print "<br><b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }    
}
?>

<form method="POST">
    
    <h3>Форма регистрации</h3>
    <p>Придумайте логин и пароль. </p>
    Логин: <input name="login" type="text"><br><br>
    Пароль: <input name="password" type="password"><br><br>
    <input name="submit" type="submit" value="Зарегистрироваться">
    
    <input name="clear" type="submit" value="Очистить БД">
    <input name="test" type="submit" value="Заменить на тестовые данные">
</form>