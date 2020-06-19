<?php
session_start();

include 'bd.php';
include 'funct.php';

if (isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
        $err[] = 'Введите имя!';
    }
    
    if (empty($_POST['surname'])) {
        $err[] = 'Введите фамилию!';
    }
    
    //Проверяем email
    if (empty($_POST['middlename'])) {
        $err[] = 'Введите отчество!';
    }

    //Проверяем наличие ошибок и выводим пользователю
    if (count($err) > 0) {
        echo showErrorMessage($err);
        if ($_SESSION['role' == 1]) {
            echo '<meta http-equiv="refresh" content="5; url=adminprofile.php">';
        } else {
            echo '<meta http-equiv="refresh" content="5; url=userprofile.php">';
        }
    } else {
        $sql = 'UPDATE profile SET 
        name = :name, 
        surname = :surname, 
        middlename = :middlename         
        WHERE id = '. $_SESSION['id'] .'
        ';

        //Подготавливаем PDO выражение для SQL запроса
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
        $stmt->bindValue(':surname', $_POST['surname'], PDO::PARAM_STR);
        $stmt->bindValue(':middlename', $_POST['middlename'], PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo 'Данные профиля успешно изменены!';

            $sql = 'SELECT name, surname, middlename 
                 FROM profile 
                 WHERE id = '. $_SESSION['id'] .'
                 ';
                 

            $stmt = $db->prepare($sql);
            $stmt->execute();

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION['name'] = $rows[0]['name'];
            $_SESSION['surname'] = $rows[0]['surname'];
            $_SESSION['middlename'] = $rows[0]['middlename'];

            if ($_SESSION['role' == 1]) {
                echo '<meta http-equiv="refresh" content="5; url=adminprofile.php">';
            } else {
                echo '<meta http-equiv="refresh" content="5; url=userprofile.php">';
            }
        } else {
            echo showErrorMessage('Произошла ошибка! Попробуйте позже.');
            if ($_SESSION['role' == 1]) {
                echo '<meta http-equiv="refresh" content="5; url=adminprofile.php">';
            } else {
                echo '<meta http-equiv="refresh" content="5; url=userprofile.php">';
            }
        }
    }
}
exit;
