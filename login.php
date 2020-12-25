<?php
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST') { //JEIGU PASPAUDE MYGTUKA SUMBIT
    $data = json_decode(file_get_contents('data.json'),1);
    foreach($data as $user) {
        if(($_POST['email'] ?? '') === $user['email'] &&
            md5($_POST['pass'] ?? '') === $user['pass']) {
               $_SESSION['name'] = $user['name'];
               $_SESSION['logged'] = 1;
               header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/sodinimas.php');
               die;
           }
    }
    $_SESSION['msg'] = 'Bad email or password';
    header('Location: http://localhost:8888/dashboard/agurkai/agurku-sodas/login.php');
    die;
}

if(isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
<div><?= $msg ?? '' ?></div>
    <form action="" method="POST">
        Email:<br>
        <input type="text" name="email">
        <br>
        Password:<br>
        <input type="password" name="pass" value="">
        <br><br>
        <input type="submit" value="Login" value="">  
    </form>
</body>
</html>

<?php

