<?php

include 'bd.php';

$sql = "SELECT * FROM `profile`";

$stmt = $db->prepare($sql);

if ($stmt->execute()) {
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $val) {
        print_r($val['name'] . '<br>' . '<br>');
        print_r($val['surname'] . '<br>' . '<br>');
        print_r($val['middlename'] . '<br>' . '<br>');
    }
    echo "Выше представлен список пользователей";
}
