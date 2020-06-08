<?php
 /**
 * Обработчик формы авторизации
 */
session_start();

ob_start();


include 'bd.php';
include 'funct.php';

 //Если нажата кнопка то обрабатываем данные
 if (isset($_POST['submit'])) {
     //Проверяем на пустоту
     if (empty($_POST['email'])) {
         $err[] = 'Не введен Логин';
     }
    
     if (empty($_POST['pass'])) {
         $err[] = 'Не введен Пароль';
     }
    
     //Проверяем email
     if (emailValid($_POST['email']) === false) {
         $err[] = 'Не корректный E-mail';
     }

     //Проверяем наличие ошибок и выводим пользователю
     if (count($err) > 0) {
         echo showErrorMessage($err);
     } else {
         /*Создаем запрос на выборку из базы
         данных для проверки подлиности пользователя*/
         $sql = 'SELECT * 
                FROM `user` AS `u` 
                LEFT JOIN `role` AS `r` 
                ON `u`.`role` = `r`.`id_role`
                WHERE `username` = :email
                AND `status` = 1';
         //Подготавливаем PDO выражение для SQL запроса
         $stmt = $db->prepare($sql);
         $stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
         $stmt->execute();

         //Получаем данные SQL запроса
         $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
         //Если логин совпадает, проверяем пароль
         if (count($rows) > 0) {
             //Получаем данные из таблицы
             if (md5(md5($_POST['pass']).$rows[0]['salt']) == $rows[0]['password']) {
                 $_SESSION['user'] = true;
                 $_SESSION['username'] = $_POST['email'];
                 $_SESSION['role'] = $rows[0]['role'];
                 $_SESSION['name'] = $rows[0]['name'];
             
                 if ($_SESSION['role'] == 1) {
                     //Сбрасываем параметры
                     header('Location:admin.html');
                 } else {
                     header('Location:user.html');
                     exit;
                 }
             } else {
                 echo showErrorMessage('Неверный пароль!');
             }
         } else {
             echo showErrorMessage('Логин <b>'. $_POST['email'] .'</b> не найден!');
         }
     }
 }

$content = ob_get_contents();
ob_end_clean();
