<?php
require('Dbconnects.php');

    session_start();

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>บันทึกข้อมูลผู้ป่วย</title>
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
    
    <link rel="stylesheet" href="/css/styles_web.css" />
    <link rel="stylesheet" href="/css/styles_register.css" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="insertForm.php"
          ><img
            src="/img/heart.png"
            width="60"
            height="50"
            class="d-inline-block align-text-center"
          />Cardiac Center</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto my-2 my-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="patients-lits.php">Patient List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/php/order.php">Order</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="insertForm.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="update.php">Update</a>
            </li>
            
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarScrollingDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Profile
              </a>
              <ul
                class="dropdown-menu"
                aria-labelledby="navbarScrollingDropdown"
              >
              <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Setting</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <div class="dropdown-item ">
                    <div class="homecontent">
                      <!-- logged in user information -->
                      <?php if (isset($_SESSION['username'])) : ?>
                      <a href="insertForm.php?logout='1'">Logout</a>
                      <?php endif ?>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <h1 class="center-align">Register Patient</h1>
    <div class="container">
      <div class="card">
        <div class="card-body">
        <form action="insertData.php" method="POST">
            <div class="row mb-3">
              <label for="inputText1" class="col-sm-2 col-form-label">HN</label>
              <div class="col-sm-10">
                <input type="text" 
                class="form-control" 
                id="inputText1" 
                name="member_HN"/>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText2" class="col-sm-2 col-form-label"
                >Firstname</label
              >
              <div class="col-sm-10">
                <input
                  type="text"
                  class="form-control"
                  id="inputText2"
                  name="member_fname"
                />
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText2" class="col-sm-2 col-form-label"
                >Surname</label
              >
              <div class="col-sm-10">
                <input
                  type="text"
                  class="form-control"
                  id="inputText2"
                  name="member_lname"
                />
              </div>
            </div>
            <fieldset class="row mb-3">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="member_gender"
                      id="gridRadios1"
                      value="option1"
                    />
                    <label class="form-check-label" for="gridRadios1">
                      Male
                    </label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input
                      class="form-check-input"
                      type="radio"
                      name="member_gender"
                      id="gridRadios2"
                      value="option2"
                    />
                    <label class="form-check-label" for="gridRadios2">
                      Female
                    </label>
                  </div>
                </div>
              </div>
            </fieldset>
            <div class="row mb-3">
              <label for="inputText3" class="col-sm-2 col-form-label"
                >Birth</label
              >
              <div class="col-sm-10">
                <input type="date" 
                class="form-control" 
                id="inputText3" 
                name="member_date"/>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText2" class="col-sm-2 col-form-label"
                >Age</label
              >
              <div class="col-sm-10">
                <input type="text" 
                class="form-control" 
                id="inputText2" 
                name="member_age"/>
              </div>
            </div>
            <div class="center-align">
              <button type="submit" class="btn btn-primary btn-last">
                ACCEPT
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
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
