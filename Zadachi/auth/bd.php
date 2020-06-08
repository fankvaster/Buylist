<?php
 /**
 * Подключение к базе данных
 */
include 'config.php';

//Подключение к базе данных mySQL с помощью PDO
try {
    $db = new PDO('mysql:host=127.0.0.1;dbname='.$DATABASE, $DBUSER, $DBPASSWORD, array(
        PDO::ATTR_PERSISTENT => true
        ));
} catch (PDOException $e) {
    print "Ошибка соединения!: " . $e->getMessage() . "<br/>";
    die();
}
