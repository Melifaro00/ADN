<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> Форма входа на сайт</title>
</head>
<body>
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
</style> 
<button><a href="/send3.php">Задать вопрос</a></button>
<button><a href="/login.php">Войти на сайт</a></button>
<button><a href="/register.php">Зарегистрироваться</a></button>
<hr>
<input type="checkbox" id="raz" class="del"> 
<label for="raz" class="del">1. Как мне установить XAMPP?</label>
<div> Для простмотра войдите на сайт </div><br>

<input type="checkbox" id="raz2" class="del"> 
<label for="raz2" class="del">2. Как мне запустить XAMPP??</label>
<div> Для простмотра войдите на сайт </div><br>

<input type="checkbox" id="raz3" class="del"> 
<label for="raz3" class="del">3. Как я мне остановить XAMPP?</label>
<div> Для простмотра войдите на сайт </div><br>
</body>
</html>