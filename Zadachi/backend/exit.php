<?php
include 'bd.php';
//Выход из авторизации
 if (isset($_POST['exit']) == true) {
     //Уничтожаем сессию
     session_destroy();

     //Делаем редирект
     echo '<meta http-equiv="refresh" content="0; url=index.html">';
 }
