<?php

session_start();
require 'HTML/vision-board-page.html';
include 'database.php';
$email = $_SESSION['Email'];

if(isset($email)){
    if(isset($_POST['dashboard-return'])){
        echo '<script>window.location.href = "dashboard.php";</script>';
    }
    global $conn;

    $stmt = $conn->prepare("SELECT `Dream-Job`, `Place`, `Hobby`, `Smile-Reason`, `Thing-to-Change` FROM users WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($dream, $place, $hobby, $smile, $change);
    $stmt->fetch();
    $stmt->close();
  
        echo '<script>
        document.getElementById("hobby").innerHTML = "'. $hobby .'";
        </script>';

        echo '<script>
        document.getElementById("smile").innerHTML = "'. $smile .'";
        </script>';

        echo '<script>
        document.getElementById("change").innerHTML = "'. $change .'";
        </script>';

        echo '<script>
        document.getElementById("job").innerHTML = "'. $dream .'";
        </script>';

        echo '<script>
        document.getElementById("place").innerHTML = "'. $place .'";
        </script>';


}


?>