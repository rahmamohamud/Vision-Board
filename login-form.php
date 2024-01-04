
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!--Link for browser icon-->
    <link rel="icon" type="image/x-icon" href="images/browser-icon.png">

    <!--Bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!--Link for stylesheet-->
    <link rel="stylesheet" href="CSS/login.css">
</head>
<body>
       
  <!--Login field-->
    <section class="login-page" id="login-page"> 
        <div class="container" id="landing-page" ro>
              <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                
                <div class="col-lg-6">
                    <main class="form-signin w-100 m-auto">
                      <form action="<?php echo htmlspecialchars(($_SERVER['PHP_SELF']));?>"
                      method="POST" enctype="multipart/form-data">

                          <!--Heading-->
                          <img class="mb-4" src="images/vista-logo.png" alt=""  height="30">
                          <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><span id="name">Login</span></h1>
                      
                         <!--These p tags with warnings will reflect when fields are empty or invalid-->
                         <p id="warning-fill-details" style="color: red;"></p>

                          <!--Email input-->
                          <div class="form-floating">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="emailInput">
                            <label for="floatingInput">Email address</label>
                            <p class="login-warning-email" style="color: red;"></p>
                          </div>

                          <!--Password input-->
                          <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="passwordInput">
                            <label for="floatingPassword">Password</label>
                            <p class="login-warning-password" style="color: red;"></p>
                          </div>
                      
                      
                          <!--Submit login details-->
                          <button class="btn btn-primary w-100 py-2" type="submit" id="signupbtn" name="login-button">Login</button>
                          
                          <!--Leads to sign up form-->
                          <p class="msg">Not registered? Click <a href="sign-up-form.php">Here</a> to sign up</p>

                        </form>
                      </main>
                  </div>
                
                <div class="col-10 col-sm-8 col-lg-6">
      
                  <img src="images/goal-image-front-page.png" class="d-block mx-lg-auto img-fluid" alt="phone-image"  loading="lazy" id="phone-image">
      
                </div>
               
              </div>
            </div>
      </section>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<?php  
    //database connection
include("database.php");

if (isset($_POST['login-button'])) {
    //variables containing user input
    $email = $_POST['emailInput'];
    $password = $_POST['passwordInput'];

    // SQL statement to retrieve hashed password from the database
    $sql = "SELECT Password FROM users WHERE Email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($hashed);
    $stmt->fetch();
    $stmt->close();

    // Check if a user with the given username exists
    if ($hashed) {
        // Verify the password
        if (password_verify($password, $hashed)) {
            // Password is correct, redirect the user to the dashboard
           // session_start();
           // $_SESSION['username'] = $username;
           // header('Location: dashboardUsers.php');
            // exit();
            echo "THIS WORKS";
        } else {
            // Password is incorrect
            echo 'Login Failed. Invalid password'.'<br>';

            echo $password . '<br>';
            echo $hashed;
        }
    } else {
        // User with the given username does not exist
        echo 'Login Failed. Invalid username';
    }
}
?>

</body>
</html>