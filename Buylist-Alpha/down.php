<?php

include 'bd.php';

$id = array_search('Понизить', $_POST);

$sql = 'UPDATE user_role SET role_id = 2 WHERE user_id = '. $id .'';

$stmt = $db->prepare($sql);
if ($stmt->execute()) {
    echo 'Пользователь успешно понижен!';
    echo '<meta http-equiv="refresh" content="5; url=users.php">';
} else {
    echo 'Ошибка';
    echo '<meta http-equiv="refresh" content="5; url=users.php">';
}
exit;
