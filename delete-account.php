<?php

session_start();
require 'HTML/delete-page.html';
include 'database.php';
$email = $_SESSION['Email'];
global $conn;

if(isset($email)){
    if(isset($_POST['no-delete'])){
        echo '<script>window.location.href = "Dashboard.php";</script>';
    }

if(isset($_POST['delete'])){
    
// Prepare the DELETE statement
$stmt = $conn->prepare("DELETE FROM users WHERE Email = ?");
$stmt->bind_param("s", $email);

// Execute the statement
$stmt->execute();

session_destroy();
// Close the statement
$stmt->close();
  
echo '<script>window.location.href = "Home-Page.php";</script>';

}
} else {
    echo 'no';
}

?>