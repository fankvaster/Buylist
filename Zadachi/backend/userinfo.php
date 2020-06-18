<?php

include 'bd.php';

$sql = 'select * from user join role on user.id = user_role.user_id where user.id ='.$_SESSION['id'].'';

$stmt = $db->prepare($sql);
$stmt->execute();

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$id = $rows['id'];
$role = $rows['name'];
