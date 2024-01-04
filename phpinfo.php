<?php


$hashed = '$2y$10$2kY.fqf3tQwvbGv19u0L4OrRBIj7mmq4fxqytCcCXhyHOOC8VNY4W';

$test = 'lily';

if(password_verify($test, $hashed)){
    echo 'Worked';
}else{
    echo "Nope";
}

?>