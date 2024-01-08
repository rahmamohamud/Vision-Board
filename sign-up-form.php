
<?php

require 'HTML/sign-up.html';

//Database connection
include "database.php";

include "inputData.php";

//File with validation rule functions
include "validation-rules.php";

if(isset($_POST['sign-up-button'])){

  if(validation($username, $surname, $email, $password) == 1 and checkingAccountDuplication($email, $conn) == 1){

    //SQL statement
    $sqlSubmittingData = "INSERT INTO users(Name, Surname, Email, Password) VALUES
    ('$username','$surname','$email','$password')";

    //Running above SQL statement
    mysqli_query($conn, $sqlSubmittingData);

    //Confirmation of succesful registration and link to login form
    echo '<script>
    document.getElementById("msg").innerHTML = "<a href=\'login-form.php\'>You are registered! Click Here to log in</a>";
    document.getElementById("sign-on").innerHTML = "";
    </script>';

    mysqli_close($conn); //Close the connection
      
  } else{

      //If user doesn't complete form the validation functions will run
        validation($username, $surname, $email, $password);
        checkingAccountDuplication($email, $conn);
  }

}

?>

