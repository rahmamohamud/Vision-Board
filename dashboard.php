<?php
session_start();
include 'database.php';
require 'HTML/dashboard-site.html';

// Check if 'Email' key is set in the $_SESSION array
if (isset($_SESSION['Email'])) {
    $email = $_SESSION['Email'];

    // Retrieve the name and surname associated with the email from the database
    $stmt = $conn->prepare("SELECT Name, Surname FROM users WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($userName, $userSurname);
    $stmt->fetch();
    $stmt->close();
    
    echo '<script>
    var elements = document.getElementsByClassName("user");
    for (var i = 0; i < elements.length; i++) {
        elements[i].innerHTML = "'.$userName.' '.$userSurname.'! ";
    }
</script>';

} else {
    echo "Session not set!";
}



?>
