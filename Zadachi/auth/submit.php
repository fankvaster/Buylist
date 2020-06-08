<?php
include 'bd.php';
include 'funct.php';
    
 //Производим активацию аккаунта
 if (isset($_POST['key'])) {
     //Проверяем ключ
     $sql = 'SELECT * 
            FROM `user`
            WHERE `active_hex` = :key';
     //Подготавливаем PDO выражение для SQL запроса
     $stmt = $db->prepare($sql);
     $stmt->bindValue(':key', $_POST['key'], PDO::PARAM_STR);
     $stmt->execute();
     $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

     if (count($rows) == 0) {
         $err[] = 'Ключ активации не верен!';
         echo '<meta http-equiv="refresh" content="5; url=index.html">';
     }
    
     //Проверяем наличие ошибок и выводим пользователю
     if (count($err) > 0) {
         echo showErrorMessage($err);
     } else {
         //Получаем адрес пользователя
         $email = $rows[0]['username'];
    
         //Активируем аккаунт пользователя
         $sql = 'UPDATE `user`
                SET `status` = 1
                WHERE `username` = :email';
         //Подготавливаем PDO выражение для SQL запроса
         $stmt = $db->prepare($sql);
         $stmt->bindValue(':email', $email, PDO::PARAM_STR);
         $stmt->execute();
   
         //Отправляем письмо об активации
         $title = 'Ваш аккаунт на http://buylist.ru успешно активирован';
         $message = 'Поздравляю Вас, Ваш аккаунт на http://buylist.ru успешно активирован';
            
         sendMessageMail($email, $MAIL_AUTOR, $title, $message);

         //Выводим сообщение об удачной регистрации
         echo '<b>Ваш аккаунт на http://buylist.ru успешно активирован!</b>';
            
         /*Перенаправляем пользователя на
         нужную нам страницу*/
         echo '<meta http-equiv="refresh" content="5; url=index.html">';
     }
 }
