<?php

include 'bd.php';
include 'funct.php';

if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['middlename'])) {
    $sql = 'INSERT INTO `profile`(`name`, `surname`, `middlename`, `status`, `role`) 
        VALUES (
        :name,
        :surname,
        :middlename,
        1,
        2
    )';

    //Подготавливаем PDO выражение для SQL запроса
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
    $stmt->bindValue(':surname', $_POST['surname'], PDO::PARAM_STR);
    $stmt->bindValue(':middlename', $_POST['middlename'], PDO::PARAM_STR);
    
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['surname'] = $_POST['surname'];
    $_SESSION['middlename'] = $_POST['middlename'];

    if ($stmt->execute()) {
        echo 'Данные профиля успешно изменены!';
        if ($_SESSION['role' == 1]) {
            echo '<meta http-equiv="refresh" content="5; url=adminprofile.html">';
        } else {
            echo '<meta http-equiv="refresh" content="5; url=userprofile.html">';
        }
    } else {
        echo showErrorMessage('Произошла ошибка! Попробуйте позже.');
        if ($_SESSION['role' == 1]) {
            echo '<meta http-equiv="refresh" content="5; url=adminprofile.html">';
        } else {
            echo '<meta http-equiv="refresh" content="5; url=userprofile.html">';
        }
    }
}
