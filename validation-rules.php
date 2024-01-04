<?php

//PHP files that contain validation check functions
function checkingAccountDuplication($email, $conn){ 

    //sql statement to retrieve enrollment data from database
    $emailMatch = "SELECT * FROM users WHERE
    Email='$email'";
    
    $checkAccount = mysqli_query($conn, $emailMatch);
    
    //This validation checks if the enrollment data does not already exist, to avoid data duplication
    if(mysqli_num_rows($checkAccount)>0){
      echo '<script>
    
      document.getElementById("warning-fill-details").innerHTML = "Kindly fill all fields*";
    
      document.getElementById("warning-input-email").innerHTML = "Email address is already in use. Please use another address*";</script>';
    }
      else{
          return 1;
      }
    }
    
    function validation($username, $surname, $email, $password){
    
    if(empty($username)){
      echo '<script>
      document.getElementById("warning-fill-details").innerHTML = "Kindly fill all fields*";
    
      document.getElementById("warning-input-name").innerHTML = "Please enter your name*";
      </script>';
    }
    
    elseif(empty($surname)){
      echo '<script>
    
      document.getElementById("warning-fill-details").innerHTML = "Kindly fill all fields*";
    
      document.getElementById("warning-input-surname").innerHTML = "Please enter your surname*";</script>';
    
    }
    
    elseif(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
      echo '<script>
          document.getElementById("warning-fill-details").innerHTML = "Kindly fill all fields*";
          document.getElementById("warning-input-email").innerHTML = "Please enter a valid email adress*";
      </script>';
    }
    
    elseif(empty($password)){
      echo '<script>
    
      document.getElementById("warning-fill-details").innerHTML = "Kindly fill all fields*";
    
      document.getElementById("warning-input-password").innerHTML = "Please enter a password*";</script>';
    
    }
    
    else{
      return 1;
    }
    
    } 

?>