<?php
session_start();
include 'bd.php';
//Выход из авторизации
 if (isset($_POST['exit']) == true) {
     //Уничтожаем сессию
     session_destroy();
     unset($_SESSION['password']);
     unset($_SESSION['name']);
     unset($_SESSION['id']);
     unset($_SESSION['role']);

     //Делаем редирект
     exit('<meta http-equiv="refresh" content="0; url=index.php">');
 }
