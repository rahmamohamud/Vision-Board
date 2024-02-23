<?php

$username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
$surname = isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : '';
$email = isset($_POST['emailAddress']) ? filter_var($_POST['emailAddress'], FILTER_SANITIZE_EMAIL) : '';
$inputPassword = isset($_POST['userPassword']) ? htmlspecialchars($_POST['userPassword']) : '';
$password = password_hash($inputPassword, PASSWORD_DEFAULT);

?>