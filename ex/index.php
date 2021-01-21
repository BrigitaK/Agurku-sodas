<?php

$z = 0;
// class A{}
// $a = new A;
// $a->z();

class customException extends Exception {}

try {
    if($z===0) {
        throw new customException("Value must be not 0");
    }

echo 1/$z;
}
catch (Exception $e) {
    echo '<br>Message: ' .$e->getMessage();
}
// catch (DivisionByZeroError $e) {
//     echo "Caught DivisionByZeroError!\n";
// }


echo '<br>Gero savaitgalio';