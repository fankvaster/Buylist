<?php session_start();
include 'bd.php';

$sql = "SELECT name, surname, middlename, role FROM `profile`";

$stmt = $db->prepare($sql);

if ($stmt->execute()) {
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>AdminPanel</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Features-Blue.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search-1.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
</head>

<body>
    <div>
        <div class="header-blue" style="background-image: url(&quot;assets/img/theme.jpg&quot;);background-size: auto;height: 768px;width: 1280px;">
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
                <div class="container-fluid"><a class="navbar-brand text-dark" href="#">Buylist</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#">О нас</a></li>
                            <li class="nav-item dropdown"><a class="dropdown-toggle nav-link text-dark" data-toggle="dropdown" aria-expanded="false" role="button" aria-haspopup="true">Меню</a>
                                <div class="dropdown-menu" role="menu" aria-labelledby="navbarDropdown"><a class="dropdown-item" role="presentation" href="untitled-3.html">Добавить товар</a>
                            </li>
                        </ul>                     
            </nav>
    <table>
        <thead>
    <tr>
      <th id="id" class="col-md-3 col-xs-3">id</th>
      <th id="name" class="col-md-5 col-xs-5">Имя</th>
      <th id="surname" class="col-md-4 col-xs-4">Фамилия</th>
      <th id="middlename" class="col-md-5 col-xs-5">Отчество</th>
      <th id="role" class="col-md-5 col-xs-5">Роль</th>
    </tr>
    
    </thead>
        <tbody>';
    
    foreach ($rows as $val) {
        echo '
        <tr><td id="id">'. $val['id'] .'</td>
        <td id="name">'. $val['name'] .'</td>
        <td id="surname">'. $val['surname'] .'</td><br>
        <td id="middlename">'. $val['middlename'] .'</td>
        <td id="role">'. $val['role'] .'</td>';
    }
    echo '</tr></tbody>
        </table>';
}

        echo '
            
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
</body>

</html>
';
