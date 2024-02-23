<?php
session_start();
include 'database.php';

require 'HTML/questions-page.html';

//variables

$dream = isset($_POST['career']) ? htmlspecialchars($_POST['career']) : '';

$place = isset($_POST['place']) ? htmlspecialchars($_POST['place']) : '';

$hobby = isset($_POST['hobby']) ? htmlspecialchars($_POST['hobby']) : '';

$smile = isset($_POST['smile-reason']) ? htmlspecialchars($_POST['smile-reason']) : '';

$change = isset($_POST['change-reason']) ? htmlspecialchars($_POST['change-reason']) : '';

$generate = $_POST['generate-board'];

///////////////////////////////////////////

if(isset($_POST['dashboard'])){
    echo '<script>window.location.href = "dashboard.php";</script>';
}

if(isset($_POST['log-out'])){
    echo '<script>window.location.href = "log-out.php";</script>';
}

if (isset($_SESSION['Email'])) {
    if(isset($generate)){
        $email = $_SESSION['Email'];

        global $conn;

if(empty($dream) or empty($place) or empty($hobby) or empty($smile) or empty($change)){
    echo '<script>
        document.getElementById("warning-fill-details").innerHTML = "Please fill in empty fields*";
        </script>';
} else{
  // Update user input in the database
  $stmt = $conn->prepare("UPDATE users SET `Dream-Job` = ?, `Place` = ?, `Hobby` = ?, `Smile-Reason` = ?, `Thing-to-Change` = ? WHERE Email = ?");
  $stmt->bind_param("ssssss", $dream, $place, $hobby, $smile, $change, $email);

  // Check if the update was successful
  if ($stmt->execute()) {
    echo '<script>window.location.href = "Vision-Board.php";</script>';
    //echo '<script>alert("Board generated successfully!");</script>';
  } else {
      echo '<script>alert("Error generating board. Please try again.");</script>';
  }

  $stmt->close();
  }
}

}
?>