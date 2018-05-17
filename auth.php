<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Untitled Document</title>
    <style>
        .del { display: none; }
        .del:not(:checked) + label + * { display: none; } 
        /* вид CSS кнопки */
        .del:not(:checked) + label,
        .del:checked + label {
        display: inline-block;
        padding: 2px 10px; 
        }
        /*.del:checked + label */
    </style> 
</head>
<body>
<?php 
    session_start(); 
    $login = $_SESSION['login'];
    $auth = $_SESSION['auth'];
    //echo "login="; echo $_SESSION['login'];
    //echo "auth="; echo $_SESSION['auth'];
    if ($_SESSION["auth"] == 1)
    {
?>
    <h2>Вход выполнен</h2>
    <?php echo "Привет, $login" ?> <br><br>
    <button><a href="/send3.php">Задать вопрос</a></button>
    <form method="POST">        
        <input name="exit" type="submit" value="Выйти"></p>  
    </form>
    <?php // Если кнопка нажата
        if( isset( $_POST['exit'] ) )
        {   session_destroy();
        $auth = 0;   
        echo $auth;
        header ('Location: index.php');  // перенаправление на нужную страницу
        exit();      
    }
    ?>    
    <hr>
    <input type="checkbox" id="raz" class="del"> 
    <label for="raz" class="del">
        1. Как мне установить XAMPP?
    </label>
    <div>
        <p>Выберите ващу операционную систему и 32 или 64 битную версию.</p>
        <p>Измените разрешения для установщика</p>        
        <p>chmod 755 xampp-linux-*-installer.run</p>        
        <p>Запустите установщик</p>        
        <p>sudo ./xampp-linux-*-installer.run</p>        
        <p>Вот и всё. XAMPP теперь установлен под каталогом /opt/lampp.</p>    
    </div><br>

    <input type="checkbox" id="raz2" class="del"> 
        <label for="raz2" class="del">
            2. Как мне запустить XAMPP??
        </label>
    <div>
        <p>Starting XAMPP 1.8.2...</p>
        <p>LAMPP: Starting Apache...</p>
        <p>LAMPP: Starting MySQL...</p>
        <p>LAMPP started.</p>
        <p>Ready. Apache and MySQL are running.</p>
        <p>Если вы получили сообщение об ошибке посетите страницы нашего сообщества для помощи.</p>
        <p>Кстати, заметьте что есть графический инструмент который вы можете использовать чтобы легко управлятся с вашими серверами. Вы можете запустить этот инструмент с помощью следующих команд:</p>
        <p>cd /opt/lampp</p>
        <p>sudo ./manager-linux.run (or manager-linux-x64.run)</p>
    </div><br>

    <input type="checkbox" id="raz3" class="del"> 
        <label for="raz3" class="del">
            3. Как я мне остановить XAMPP?
        </label>
    <div>
        <p> Для остановки XAMPP просто вызовите команду:</p>
        <p>sudo /opt/lampp/lampp stop            </p>
        <p>Теперь вы должны видить чтото вроде этого на вашем экране:</p>
        <p>Stopping XAMPP 1.8.2...</p>
        <p>LAMPP: Stopping Apache...  </p>          
        <p>LAMPP: Stopping MySQL...       </p>     
        <p>LAMPP stopped.            </p>
        <p>Если вы получили сообщение об ошибке посетите страницы нашего сообщества для помощи.</p>
        <p>Кстати, заметьте что есть графический инструмент который вы можете использовать чтобы легко запустить или остановить ваши сервера. Вы можете запустить этот инструмент с помощью следующих команд:</p>
        <p>cd /opt/lampp</p> 
        <p>sudo ./manager-linux.run (or manager-linux-x64.run)</p>
    </div><br>
    <br>
    <hr>
    <br><br>
    <?php 
    }
    else
    {
        header ('Location: index.php');  // перенаправление на нужную страницу
        exit(); 
    }
?>


</body>
</html>
