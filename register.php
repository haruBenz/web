<?php 
    session_start();
    include('Dbconnects.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardiac certer</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
      crossorigin="anonymous"
    />
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous"
    />
   
    <link rel='stylesheet' href='/css/styles_sign up.css'/>
    <script src="https://www.gstatic.com/firebasejs/8.2.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.2/firebase-firestore.js"></script>
</head>

<body>
    <div id="user-login">
      <div class="container">
        <br /><br />
        <h1 class="mb-3">HEART FAILURE SYSTEM</h1>
        <a><img src="/img/login_logo.jpg" height="180px"/></a>
        <br /><br />
        <form action="register_db.php" method="post">
        <?php include('errors.php'); ?>
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Create your accont</label>
            <br/>
            <div class="box">
              <div class="row g-3">
                <div class="box">
                  <input class="form-control" 
                  type="text" 
                  placeholder="Username" 
                  name="username">
                </input> 
                </div>
                <div class="box">
                  <input class="form-control" 
                  type="email" 
                  placeholder="Email" 
                  name="email"></input> 
                </div>
                <div class="col">
                    <label for="password_1" class="visually-hidden">Password</label>
                    <input type="password" 
                    class="form-control" 
                    placeholder="Password" 
                    name="password_1">
                </div>
               <div class="col">
                    <label for="password_2" class="visually-hidden">Confirm Password</label>
                    <input type="password" 
                    class="form-control" 
                    placeholder="Confirm Password" 
                    name="password_2">
                  </div>
              </div>
              <br/>
              <div class="center-align">
                <button  type="submit" class="btn btn-primary" id="signup" name="reg_user">Register</button>
              </div>
            </div> 
          </div>
          <p>Already a member? <a href="login.php">Sign in</a></p>
        </form>  
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"
    ></script>
</body>
</html>