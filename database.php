<?php
define('db_server', 'localhost');
define('db_user', 'root');
define('db_password', '');
define('db_name', 'vision-board');
$conn = "";

# Connection check
try {
    $conn = mysqli_connect(db_server, db_user, db_password, db_name);
    if (!$conn) {
    throw new mysqli_sql_exception(mysqli_connect_error());
    }
    
    echo 'Database connected';
    
    } catch (mysqli_sql_exception $e) {
    echo 'Database is not connected: ' . $e->getMessage();
    }
    ?>
    