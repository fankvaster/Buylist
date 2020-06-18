<?php
 /**
 * Обработчик формы авторизации
 */
session_start([
    'cookie_lifetime' => 86400,
]);

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
         echo '<meta http-equiv="refresh" content="5; url=auth.html">';
     } else {
         /*Создаем запрос на выборку из базы
         данных для проверки подлиности пользователя*/
         $sql = 'SELECT * 
                FROM user AS u 
                LEFT JOIN user_role AS r 
                ON u.id = r.user_id
                WHERE u.username = :email
                AND u.status = 1';
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
                 $_SESSION['role'] = $rows[0]['role_id'];
                 $_SESSION['id'] = $rows[0]['id'];


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
             

                 //Проверяем зашел ли пользователь
                 if ($user === false) {
                     echo '<h3>Доступ закрыт, Вы не вошли в систему!</h3>'."\n";
                 } elseif ($_SESSION['role'] == 1) {
                     echo '<link rel="stylesheet" href="assets/css/style.css">
                     <h4>Добро пожаловать <span class="green">'. $_SESSION['surname'] .' 
                     '. $_SESSION['name'] .' '. $_SESSION['middlename'] .'

        </span> - вы вошли как <span style="color:red;">'.$_SESSION['username'].'';
                     echo '<meta http-equiv="refresh" content="5; url=admin.php">';
                 } else {
                     echo '<link rel="stylesheet" href="assets/css/style.css">
                     <h4>Добро пожаловать <span class="green">'. $_SESSION['surname'] .' 
                     '. $_SESSION['name'] .' '. $_SESSION['middlename'] .'

        </span> - вы вошли как <span style="color:red;">'.$_SESSION['username'].'';
                     echo '<meta http-equiv="refresh" content="5; url=user.php">';
                 }

                
                 exit;
             } else {
                 echo showErrorMessage('Неверный пароль!');
                 echo '<meta http-equiv="refresh" content="5; url=auth.html">';
             }
         } else {
             echo showErrorMessage('Логин <b>'. $_POST['email'] .'</b> не найден!');
             echo '<meta http-equiv="refresh" content="5; url=auth.html">';
         }
     }
 }
