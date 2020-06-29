<?php
session_start();

include 'bd.php';
include 'funct.php';
include 'class.php';


if (array_search('Изменить', $_POST)) {
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

    //Проверяем наличие ошибок и выводим пользователю
    if (count($err) > 0) {
        echo showErrorMessage($err);
        echo '<meta http-equiv="refresh" content="2; url=EditProd.php">';
    } else {
        $Product->EditProduct();
        echo '<meta http-equiv="refresh" content="2; url=admin.php">';
    }
}
