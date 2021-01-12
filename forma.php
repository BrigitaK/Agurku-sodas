


<form action="<?= URL.'login' ?>" method="post"> 

<input type="text" name="x" value="<?= $_POST['x'] ?? '' ?>"><br>
<input type="text" name="y" value="<?= $_POST['y'] ?? '' ?>"><br>

<button type="submit">Sumuoti</button>

</form>

<?php
//action yra url tas pats kas href
//internetu perduodami tik stringai
//dazniausiai inpute naudojamas type text
//dar naudojamas type file

if(!empty($_POST)) {

    $rez = (float)($_POST['x']??0) + (float)($_POST['y']??0);

    echo $rez;
}

//isset ar egzistuoja
//get masyvas visada egzistuoja, reikia tikrinti ar ne tuscias*/