<?php

session_start();
require 'HTML/dashboard-site.html';
error_reporting(E_ALL);
ini_set('display_errors', '1');

include 'database.php';



function newUser(){
    global $conn;
    $dream = '';
    $place = '';
    $hobby = '';
    $smile = '';
    $change = '';
    $email = $_SESSION['Email'];

    $stmt = $conn->prepare("SELECT `Dream-Job`, `Place`, `Hobby`, `Smile-Reason`, `Thing-to-Change` FROM users WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($dream, $place, $hobby, $smile, $change);
    $stmt->fetch();
    $stmt->close();

    var_dump($dream, $place, $hobby, $smile, $change);

    if (!isset($dream) || $dream === "" || 
        !isset($place) || $place === "" || 
        !isset($hobby) || $hobby === "" || 
        !isset($smile) || $smile === "" || 
        !isset($change) || $change === "") {
        echo '<script>
        document.getElementById("returningUser").innerHTML = "";
        
        </script>';
    } else {
        echo '<script>
        document.getElementById("newUser").innerHTML = "";
        </script>';
    }
}


// Check if 'Email' key is set in the $_SESSION array
if (isset($_SESSION['Email'])) {
    
    
    $email = $_SESSION['Email'];

    newUser();
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

// Check if the "create-board" button was clicked
if(isset($_POST['create-board'])){
    echo '<script>window.location.href = "questions.php";</script>';
}

// Check if the "create-board" button was clicked
if(isset($_POST['update-board'])){
    echo '<script>window.location.href = "update.php";</script>';
}

} else {
    echo "Session not set. Kindly log in";
}
?>
