<?php
session_start();

if(isset($_GET['logout'])) {
    $_SESSION['logged'] = 0;
    Main\App::redirect(login);
}

if(isset($_SESSION['logged']) && 1 == $_SESSION['logged']) {
    echo "<span style='display: block; max-width: 200px; text-align:center; margin: auto; margin-top: 50px; padding: 100px; border: 2px solid #DCDCDC; border-radius: 5px; font-size: 20px'>
    Tu jau esi prisijungęs.</span>";
    die;
}

if($_SERVER['REQUEST_METHOD'] === 'POST') { //JEIGU PASPAUDE MYGTUKA SUMBIT
    $data = json_decode(file_get_contents('data.json'),1);
    foreach($data as $user) {
        if(($_POST['vardas'] ?? '') === $user['name'] &&
            md5($_POST['pass'] ?? '') === $user['pass']){
               $_SESSION['vardas'] = $user['name'];
               $_SESSION['logged'] = 1;
               Main\App::redirect(sodinimas);
           }
    }
    $_SESSION['msg'] = "<span style='display: block; max-width: 300px; text-align:center; margin: auto; margin-top: 20px; font-size: 20px; color: #5c565c; text-transform: uppercase'>
    Bad name or password.</span>";
    Main\App::redirect(login);
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
<style>
    body {
        background: #e7e9ec;
    }
    h1 {
        display: block;
        margin: auto;
        text-align: center;
        margin-top: 80px;
        color: #a49fa5;
        text-transform: uppercase;

    }
    p {
        display: block;
        margin: auto;
        width: 375px;
        text-align: center;
        margin-top: 80px;
        color: #a49fa5;
        font-size: 25px;
    }
    form {
        display: block;
        border: 2px solid #DCDCDC;
        border-radius: 5px;
        margin: auto;
        margin-top: 40px;
        width: 400px;
        padding: 30px;
        padding-right: 0px;
        background: #fff;
    }
    input {
        padding: 0 20px;
        height: 50px;
        width: 320px;
        font-size: 20px;
        border-radius: 5px;
        border: 2px solid #DCDCDC;
    }
    input:hover {
        border: 2px solid #1877f2;
    }
    .btn {
        background: none;
        border-radius: 5px;
        font-size: 20px;
        height: 55px;
        width: 365px;
        padding: 0 20px;
    }
    .btn:hover {
        background: #1877f2;
        color: #fff;
    }
</style>
<body>
    <h1>Daržovių sodas</h1>
    <p>Norėdami prisijungti įveskite: vardas: Jonukas, password: 123</p>
    <div><?= $msg ?? '' ?></div>
    <form action="<?= URL.'login' ?>" method="POST">
        <input type="text" name="vardas" placeholder="Vardas">
        <br><br>
        <input type="password" name="pass" value="" placeholder="Password">
        <br><br>
        <input class="btn" type="submit" value="Login" value="">  
    </form>
</body>
</html>

<?php

