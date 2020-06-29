<?php
session_start();

include 'bd.php';
include 'funct.php';
include 'class.php';



if (isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
        $err[] = 'Введите название товара!';
    }

    if (empty($_POST['category'])) {
        $err[] = 'Введите категорию товара!';
    }

    if (empty($_POST['manufacturer'])) {
        $err[] = 'Введите производителя товара!';
    }

    if (empty($_POST['price'])) {
        $err[] = 'Введите цену товара!';
    }

    if (empty($_POST['uid'])) {
        $err[] = 'Введите уникальный номер товара!';
    }

    //Проверяем наличие ошибок и выводим пользователю
    if (count($err) > 0) {
        echo showErrorMessage($err);
        echo '<meta http-equiv="refresh" content="2; url=AddProd.php">';
    } else {
        $Product->AddProduct();
        echo '<meta http-equiv="refresh" content="2; url=AddProd.php">';
    }
}
