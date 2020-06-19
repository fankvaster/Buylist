<?php
 /**
 * Обработчик формы регистрации
 */
include 'bd.php';
include 'funct.php';
    
 /*Если нажата кнопка на регистрацию,
 начинаем проверку*/
 if (isset($_POST['submit'])) {
     //Утюжим пришедшие данные
     if (empty($_POST['email'])) {
         $err[] = 'Поле Email не может быть пустым!';
     } else {
         if (emailValid($_POST['email']) === false) {
             $err[] = 'Не правильно введен E-mail'."\n";
         }
     }
    
     if (empty($_POST['pass'])) {
         $err[] = 'Поле Пароль не может быть пустым';
     }
    
     if (empty($_POST['pass2'])) {
         $err[] = 'Поле Подтверждения пароля не может быть пустым';
     }
    
     //Проверяем наличие ошибок и выводим пользователю
     if (count($err) > 0) {
         echo showErrorMessage($err);
         echo '<meta http-equiv="refresh" content="2; url=reg.html">';
     } else {
         /*Продолжаем проверять введеные данные
         Проверяем на совпадение пароли*/
         if ($_POST['pass'] != $_POST['pass2']) {
             $err[] = 'Пароли не совпадают';
         }
            
         //Проверяем наличие ошибок и выводим пользователю
         if (count($err) > 0) {
             echo showErrorMessage($err);
         } else {
             /*Проверяем существует ли у нас
             такой пользователь в БД*/
             $sql = 'SELECT username 
                    FROM user
                    WHERE username = :login';
             //Подготавливаем PDO выражение для SQL запроса
             $stmt = $db->prepare($sql);
             $stmt->bindValue(':login', $_POST['email'], PDO::PARAM_STR);
             $stmt->execute();
             $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
             if (count($rows) > 0) {
                 $err[] = 'К сожалению Логин: <b>'. $_POST['email'] .'</b> занят!';
             }
            
             //Проверяем наличие ошибок и выводим пользователю
             if (count($err) > 0) {
                 echo showErrorMessage($err);
                 echo '<meta http-equiv="refresh" content="2; url=reg.html">';
             } else {
                 //Получаем ХЕШ соли
                 $salt = salt();
                
                 //Солим пароль
                 $pass = md5(md5($_POST['pass']).$salt);

                 $active_hex = md5($salt);

                
                 /*Если все хорошо, пишем данные в базу*/
                 $sql = 'INSERT INTO  `user` (`username`, `password`, `salt`, `active_hex`, `status`) 
                 VALUES (
                                
                                :email,
                                :pass,
                                :salt,
                                :active_hex,
                                0
                                )';

                 //Подготавливаем PDO выражение для SQL запроса
                 $stmt = $db->prepare($sql);
                 $stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
                 $stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
                 $stmt->bindValue(':salt', $salt, PDO::PARAM_STR);
                 $stmt->bindValue(':active_hex', $active_hex, PDO::PARAM_STR);
                 $stmt->execute();

                 $sql = 'INSERT INTO `profile`(`name`, `surname`, `middlename`, `status`) 
                VALUES (
                                "",
                                "",
                                "",
                                0
                                )';

                 //Подготавливаем PDO выражение для SQL запроса
                 $stmt = $db->prepare($sql);
                 $stmt->execute();


                 $sql = 'INSERT INTO `user_role`(role_id) 
                 VALUES (
                 2
                 )';

                 //Подготавливаем PDO выражение для SQL запроса
                 $stmt = $db->prepare($sql);
                 $stmt->execute();
        
                
                 //Отправляем письмо для активации
                 $url = 'key='. md5($salt);
                 $title = 'Регистрация на http://buylist.ru';
                 $message = 'Для активации Вашего акаунта используйте данный ключ активации 
                '. $url .'';
                
                 sendMessageMail($_POST['email'], $MAIL_AUTOR, $title, $message);

                 //Выводим сообщение об удачной регистрации
                 echo '<b>Вы успешно зарегистрировались! Пожалуйста активируйте свой аккаунт!</b>';
                 
                 //Сбрасываем параметры
                 echo '<meta http-equiv="refresh" content="2; url=index.php">';
                 exit;
             }
         }
     }
 }
