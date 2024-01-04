<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Vision Board</title>


    <!--Bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!--Link to browser icon-->
    <link rel="icon" type="image/x-icon" href="images/browser-icon.png">
    
    <!--Link to stylesheet-->
    <link rel="stylesheet" href="CSS/questions.css">

    <!--Navigation-->       
    <nav class="navbar navbar-expand-lg fixed-top" aria-label="Main navigation">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="images/vista-logo.png" class="logo"></a>
          <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="nav-item" ></ul>
          
              <!--Log out button-->
                <button type="button" id="navbar-button" class="btn btn-primary btn-lg px-4 me-md-2" name="log-out">Log Out</button>
          
          </div>
        </div>
      </nav>
    

<body>
<main class="questions">
  <div class="container py-4">
    
    <!--Create board field-->
    <div class="p-5 mb-4 bg-body-tertiary rounded-3" >
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Create Board</h1>

        <form action="<?php echo htmlspecialchars(($_SERVER['PHP_SELF']));?>"
          method="POST" enctype="multipart/form-data">

        <!--Questions-->
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="What is your dream career?" name="career">
            <label for="floatingInput">What is your dream job for this year?</label>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="What are three places you want to visit in 2024?" name="place">
            <label for="floatingInput">What is one place you want to visit in 2024?</label>
        </div>

        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="What new hobby do you want to take on?" name="hobby">
          <label for="floatingInput">What new hobby do you want to take on?</label>
      </div>
      
      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" placeholder="What makes you smile?" name="smile-reason">
        <label for="floatingInput">What makes you smile?</label>
    </div>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="What is one thing you want to change in 2024?" name="change-reason">
      <label for="floatingInput">What is one thing you want to change in 2024?</label>
  </div>

        <!--Generate board button-->
        <button class="btn btn-primary btn-lg" type="button" name="generate-board" >Generate Board</button>
        </form>
      </div>
    </div>
    </div>
  </div>
</main>



<script src="JavaScript-files/index.js"></script>

    </body>
</html>
