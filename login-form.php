<?php  
session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'HTML/login.html';
    //database connection
include("database.php");
include ('inputData.php');

if(isset($_POST['login-button'])){

$email = filter_input(INPUT_POST, 'emailInput', FILTER_SANITIZE_EMAIL);

// Retrieve hashed password and email from the database
$stmt = $conn->prepare("SELECT ID, Password, Email FROM users WHERE Email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($userId, $hashed_password, $db_email);
$stmt->fetch();
$stmt->close();

if ($hashed_password !== null) {
    //Verify the provided password against the hashed password
    if (password_verify($_POST['passwordInput'], $hashed_password)) {

      $_SESSION['Email'] = $email;
      // echo $x;
      

      header('Location: dashboard.php');

        // Additional code for successful login, such as session management or redirection
    } else {
        // Inside the "Invalid password!" block
echo "Password verification failed. User Entered Password: " . $_POST['passwordInput'] . ", Hashed Password from Database: $hashed_password";

    }
} else {
    echo "Email not found!";
}

// Close the database connection
$conn->close();

}

?>
