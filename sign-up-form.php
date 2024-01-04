<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <!--Bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--Link to browser icon-->
    <link rel="icon" type="image/x-icon" href="images/browser-icon.png">

    <!--Link to stylesheet-->
    <link rel="stylesheet" href="CSS/sign-up.css">
</head>
<body>
    
  <!--Sign up field-->
    <section class="sign-up-page" id="sign-up-page"> 
        <div class="container" id="landing-page" ro>
              <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
      
                    <img src="images/sign-up-form-image.png" class="d-block mx-lg-auto img-fluid" alt="phone-image"  loading="lazy" id="phone-image">
        
                  </div>
                <div class="col-lg-6">
                    <main class="form-signin w-100 m-auto">

                      <form action="<?php echo htmlspecialchars(($_SERVER['PHP_SELF']));?>"
                        method="POST" enctype="multipart/form-data">
                          <img class="mb-4" src="images/vista-logo.png" alt=""  height="30">
                          <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><span id="name">Sign Up</span></h1>
                            
                          <!--These p tags with warnings will reflect when fields are empty-->
                          <p id="warning-fill-details" style="color: red;"></p>

                          <!--Name field-->
                          <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="username">
                            <label for="floatingInput">Name</label>
                            <p id="warning-input-name" style="color: red;"></p>
                          </div>

                          <!--Surname field-->
                          <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Surname" name="surname">
                            <label for="floatingInput">Surname</label>
                            <p id="warning-input-surname" style="color: red;"></p>
                          </div>
                          
                          <!--Email field-->
                          <div class="form-floating">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="emailAddress">
                            <label for="floatingInput">Email address</label>
                            <p id="warning-input-email" style="color: red;"></p>
                          </div>

                          <!--Password-->
                          <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                            <p id="warning-input-password" style="color: red;"></p>
                          </div>
                      
                          <!--Sign up button-->
                          <button class="btn btn-primary w-100 py-2" type="submit" id="signupbtn" name="sign-up-button">Sign Up</button>
                          
                          <!--Leads to login form-->
                          <p class="msg" id="msg">Already a member? Click <a href="login-form.php">Here</a> to log in</p>

                        </form>
                      </main>
                  </div>
              </div>
            </div>
      </section>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>   


<?php

include "database.php";

$username = filter_input(INPUT_POST, 'username', 
FILTER_SANITIZE_SPECIAL_CHARS);

$surname = filter_input(INPUT_POST, 'surname', 
FILTER_SANITIZE_SPECIAL_CHARS);

$email = filter_input(INPUT_POST, 'emailAddress', FILTER_SANITIZE_EMAIL);

$inputPassword = filter_input(INPUT_POST, 'userPassword', 
FILTER_SANITIZE_SPECIAL_CHARS);

$password = password_hash($inputPassword, PASSWORD_DEFAULT);

include "validation-rules.php";

if(isset($_POST['sign-up-button'])){

  if(validation($username, $surname, $email, $password) == 1 and checkingAccountDuplication($email, $conn) == 1){

    //sql statement
    $sqlSubmittingData = "INSERT INTO users(Name, Surname, Email, Password) VALUES
    ('$username','$surname','$email','$password')";

    //running above sql statement
    mysqli_query($conn, $sqlSubmittingData);

    echo '<script>
    document.getElementById("msg").innerHTML = "<a href=\'login-form.php\'>You are registered! Click Here to log in</a>";
    </script>';

    mysqli_close($conn); //close the connection
      
  }else{
        validation($username, $surname, $email, $password);
        checkingAccountDuplication($email, $conn);
  }

}

?>

</body>
</html>