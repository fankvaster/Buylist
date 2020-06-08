<?php
 /**
 * Скрипт распределения ресурсов
 * Проверяем права на чтение данных,
 * только для зарегистрированных пользователей
 */

 //Проверяем зашел ли пользователь
 if ($user === false) {
     echo '<h3>Доступ закрыт, Вы не вошли в систему!</h3>'."\n";
 }
 if ($user === true) {
     echo '<h4>Добро пожаловать <span style="color:red;">'. $_SESSION['username'] .'

	    </span> - вы вошли как <span style="color:red;">'.$_SESSION['username'].'';

     //Запрос на выборку контента согласно роли
     $sql = 'SELECT * FROM `content`

	            WHERE `role` LIKE "%'. $_SESSION['role'] .'%"';

     $stmt = $db->prepare($sql);

     //Выводим контент
     if ($stmt->execute()) {
         $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

             
         foreach ($rows as $val) {
             echo '# - <strong>'. $val['id'] .'</strong><br/>';

             echo $val['content'] .'<br/><br/>';
         }
     }
 }
 ?>
	