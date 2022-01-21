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
    <title>Cardiac center</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
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
    <link rel="stylesheet" href="/css/styles_update.css" />
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
            <li class="nav-item dropdown">
              <a class="nav-link" href="patients-lits.php">Patient List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/php/order.php">Order</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="insertForm.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="update.php">Update</a>
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
                  <div class="dropdown-item">
                    <div class="homecontent">
                      <!-- logged in user information -->
                      <?php if (isset($_SESSION['username'])) : ?>
                      <a href="update.php?logout='1'">Logout</a>
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

    <h1 class="center-align">เพิ่มข้อมูลยา</h1>
    <div class="container">
      <div class="card">
        <div class="card-body">
          <form action = "updateMed.php" method="POST" enctype="multipart/from-data">
            <div class="row mb-3">
              <label for="inputText1" class="col-sm-2 col-form-label"
                >CODE:</label
              >
              <div class="col-sm-10">
                <input type="text" 
                class="form-control" 
                id="inputText1" 
                name="med_code"/>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText1" class="col-sm-2 col-form-label"
                >ชื่อยา:</label
              >
              <div class="col-sm-10">
                <input type="text" 
                class="form-control" 
                id="inputText1" 
                name="med_n"/>
              </div>
            </div>
            <div class="row mb-3">
            <label for="unit" class="col-sm-2 col-form-label">หน่วย</label>
               <div class="from-group col-sm-10">
              <select name="med_unit" class="from-control-file" >
              <option value="" >--เลือก--</option>
              <option value="เม็ด" >เม็ด</option>
              <option value="แผง">แผง</option>
              <option value="ขวด">ขวด</option>
              <option value="หลอด">หลอด</option>
              </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText1" class="col-sm-2 col-form-label"
                >รูปภาพบรรจุภัณฑ์ยา:</label
              >
              <div class="from-group col-sm-10">
                <input
                  type="file"
                  class="from-control-file"
                  id="exampleFromControlFile1"
                  name="med_pp"
                />
              </div>
            </div>
            
            <div class="row mb-3">
              <label for="inputText1" class="col-sm-2 col-form-label"
                >รูปภาพลักษณะยา:</label
              >
              <div class="from-group col-sm-10">
                <input
                  type="file"
                  class="from-control-file"
                  id="exampleFromControlFile1"
                  name="med_pm"
                />
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText2" class="col-sm-2 col-form-label"
                >สรรพคุณของยา:</label
              >
              <div class="col-sm-10">
                <textarea type="text" 
                cols="100"
                row="50"
                class="form-control" 
                id="inputText2" 
                name="med_p"></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText3" class="col-sm-2 col-form-label"
                >ผลข้างเคียง:</label
              >
              <div class="col-sm-10">
                <input type="text" 
                class="form-control" 
                id="inputText3" 
                name="med_e"/>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText2" class="col-sm-2 col-form-label"
                >คำเตือน:</label
              >
              <div class="col-sm-10">
                <input type="text" 
                class="form-control" 
                id="inputText2" 
                name="med_w"/>
              </div>
            </div>
            <div class="center-align">
              <input type="submit"
              name="med_insert"
              class="btn btn-primary btn-last"
              value="ADD">
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
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
</html>
