<?php

/* Assuming these are the names of your form fields
$username = $_POST['username'];
$surname = $_POST['surname'];
$email = $_POST['emailAddress'];
$inputPassword = $_POST['userPassword'];
$password = password_hash($inputPassword, PASSWORD_DEFAULT);*/

$username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
$surname = isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : '';
$email = isset($_POST['emailAddress']) ? filter_var($_POST['emailAddress'], FILTER_SANITIZE_EMAIL) : '';
$inputPassword = isset($_POST['userPassword']) ? htmlspecialchars($_POST['userPassword']) : '';
$password = password_hash($inputPassword, PASSWORD_DEFAULT);

?>