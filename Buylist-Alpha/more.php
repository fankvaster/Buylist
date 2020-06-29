<?php
session_start();

include 'bd.php';
include 'class.php';
include 'funct.php';

$amount = $_POST['more'];
$uid = array_search('Изменить', $_POST);

$sql = 'UPDATE manufacturer SET amount = '. $amount .' WHERE uid = '. $uid .'';

$stmt = $db->prepare($sql);
$stmt->execute();

$sql = 'UPDATE prices SET amount = '. $amount .' WHERE uid = '. $uid .'';

$stmt = $db->prepare($sql);
$stmt->execute();

echo 'Успешно изменено!';
echo '<meta http-equiv="refresh" content="2; url=index.php">';