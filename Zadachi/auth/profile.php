<?php

include 'bd.php';
include 'funct.php';

//ob_start();

if (isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
        $err[] = 'Введите имя!';
    }
    if (empty($_POST['surname'])) {
        $err[] = 'Введите фамилию!';
    }
    if (empty($_POST['middlename'])) {
        $err[] = 'Введите отчество!';
    }
} else {
    $role = $_SESSION['role'];
    $sql = 'INSERT INTO `profile`(`name`, `surname`, `middlename`, `status`, `role`) 
		VALUES (
		:name,
		:surname,
		:middlename,
		1,
		:role
	)';

    //Подготавливаем PDO выражение для SQL запроса
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
    $stmt->bindValue(':surname', $_POST['surname'], PDO::PARAM_STR);
    $stmt->bindValue(':middlename', $_POST['middlename'], PDO::PARAM_STR);
    $stmt->bindValue(':role', $role, PDO::PARAM_STR);
    
    if ($stmt->execute()) {
        echo 'Данные профиля успешно изменены!';
        echo '<meta http-equiv="refresh" content="5; url=profile.html">';
    } else {
        echo showErrorMessage('Произошла ошибка! Попробуйте позже.');
        echo '<meta http-equiv="refresh" content="5; url=profile.html">';
    }
}

//$content = ob_get_contents();
//ob_end_clean();
