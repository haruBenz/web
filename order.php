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
    <link rel="stylesheet" href="/css/styles_order.css" />
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
              <a class="nav-link active" href="/php/order.php">Order</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="/php/insertForm.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/php/update.php">Update</a>
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
                      <a href="order.php?logout='1'">Logout</a>
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

    <h2 class="center-align">????????????????????????</h2>
    <div class="container">
      <div class="card">
        <div class="card-body">
        <div class="card-body">
       
        
        <form action="searchMed.php?HN=<?php echo $row["member_HN"];?>" class="form-group" method=POST>
             <div class="row mb-3">
              <div class="row">
                <label for="inputText1" class="col-sm-1 col-form-label">???????????????</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="??????????????????????????????????????????????????????" name = "medname" >
                  <input type="submit" value="Search" class="btn btn-dark my-2">
                </div>
                </div>
              </div>
        </form>

        <!-- <form action="add2.php" class="row g-3" method="POST">
        <?php 
              require('Dbconnects.php'); 
              $sql = "SELECT * FROM medicine ORDER BY med_code ASC ";
              $result=mysqli_query($connect,$sql); ?>
        <?php foreach ($result as $row) {?>
             <div class="col-md-4">
              <label for="inputEmail4" class="form-label">HN:</label>
              <input
                type="text"
                class="form-control"
                id="inputText"
                name="or_HN"
              />
            </div>
            <div class="col-md-4">
              <label for="inputEmail4" class="form-label">CODE</label>
              <input
                type="text"
                readonly
                class="form-control"
                id="inputText"
                value="<?php echo $row["med_code"] ;?>"
                name="or_code"
              />
            </div>
            <div class="col-md-4">
              <label for="inputEmail4" class="form-label">??????????????????</label>
              <input
                type="text"
                readonly
                class="form-control"
                id="inputText"
                value="<?php echo $row["med_n"] ;?>" 
                name="or_n"
              />
            </div>
            <div class="from-group">
              <label for="">????????????????????????????????????????????????</label>
              <input type="checkbox" name="or_time[]" id="" value="???????????????????????????">???????????????????????????
              <input type="checkbox" name="or_time[]" id="" value="???????????????????????????">???????????????????????????
              <input type="checkbox" name="or_time[]" id="" value="?????????????????????">?????????????????????
            </div>
            <div class="from-group">
              <label for="">???????????????????????????????????????</label>
              <input type="checkbox" name="or_ptime[]" id="" value="????????????">????????????
              <input type="checkbox" name="or_ptime[]" id="" value="?????????????????????">?????????????????????
              <input type="checkbox" name="or_ptime[]" id="" value="????????????">????????????
              <input type="checkbox" name="or_ptime[]" id="" value="0">-
            </div>
            <div class="col-md-4">
              <label for="inputEmail4" class="form-label">??????????????????????????????????????????</label>
              <input
                type="number"
                class="form-control"
                id="inputText"
                name="or_tt"
              />
            </div>
            <div class="col-md-4">
              <label for="inputEmail4" class="form-label">??????????????????????????????????????????????????????????????????</label>
              <input
                type="number"
                class="form-control"
                id="inputText"
                name="or_day"
              />
            </div>
            <div class="center-align">
              <button type="submit" value="add" class="btn btn-primary btn-last">ADD</button>
            </div>
            <?php } ?>
        </form> -->
        

        <br>
        <?php 
              require('Dbconnects.php'); 
              $sql = "SELECT * FROM medicine ORDER BY med_code ASC ";
              $result=mysqli_query($connect,$sql);
              ?>
              <table class="table table-hover">
              <thead>
              <tr>
                <th scope="col">Hospital number</th>
                <th scope="col">CODE</th>
                <th scope="col">??????????????????</th>
                <th scope="col">????????????????????????????????????????????????</th>
                <th scope="col">???????????????????????????????????????</th>
                <th scope="col">??????????????????????????????????????????</th>
                <th scope="col">??????????????????????????????????????????????????????????????????</th>
                <th scope="col">???????????????</th>
                <th scope="col">ADD</th>
              </tr>
            </thead>
            <tbody>

             
              <?php
              foreach ($result as $row) {?>
            
              <tr>
              <form action="add2.php" method="POST">
                <td><input type="text" name="or_HN"></td>
                <td><input type="text" value="<?php echo $row["med_code"] ;?>" name="or_code" readonly></td>
                <td><input type="text" value="<?php echo $row["med_n"] ;?>" name="or_n" readonly></td>
                <td><label for="">????????????????????????????????????????????????</label>
              <input type="checkbox" name="or_time[]" id="" value="???????????????????????????">???????????????????????????
              <input type="checkbox" name="or_time[]" id="" value="???????????????????????????">???????????????????????????
              <input type="checkbox" name="or_time[]" id="" value="?????????????????????">?????????????????????</td>
                 <td><label for="">???????????????????????????????????????</label>
              <input type="checkbox" name="or_ptime[]" id="" value="????????????">????????????
              <input type="checkbox" name="or_ptime[]" id="" value="?????????????????????">?????????????????????
              <input type="checkbox" name="or_ptime[]" id="" value="????????????">????????????
              <input type="checkbox" name="or_ptime[]" id="" value="0">-</td>
                <td><input type="number" name="or_tt"/></td>
                <td><input type="number" name="or_day"></td>
                <td><input type="text" value="<?php echo $row["med_unit"] ;?>" name="or_unit" readonly></td>>
                <td><button type="submit" value="add" class="btnAddAction" >ADD</td>
            </tr>
            </form> 
            <?php } ?>

          </table>
          
            
           
           
            <!-- <div>
              <form action="" method="POST">

            <div class="row mb-3">
              <label for="inputText3" class="col-sm-1 col-form-label"></label>
              <div class="col-sm-10">
                <div class="card" style="height: 10rem">
                  <div class="card-body">
                  <table class="table table-hover">
            
                    <thead>
                    <tr>
                      <th scope="col">CODE</th>
                      <th scope="col">??????????????????</th>
                    </tr>
                  </thead>

                  <tbody>
                 
                    <tr>
                    
                      <td> </td>
                      <td> </td>
                          
                      </tr>
                  </tbody>
                </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="row row-cols-lg-auto g-3 align-items-center">
              <label for="inputText3" class="col-sm-1 col-form-label label-1"
                >??????????????? (????????????/???????????????)</label
              >
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputText" />
              </div>
              <label for="inputText3" class="col-sm-1 col-form-label label-1"
                >????????????</label
              >
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputText" />
              </div>
            </div>

            <div class="center-align">
            <button type="submit" class="btn btn-coler">ADD</button>
          </div>
          </form>

          </div> -->
        
        </div>
      </div>
    </div>
    </div>


    <!-- <h3 class="center-align">?????????????????????????????????????????????</h3>
    <div class="container">
      <div class="card mb-3">
        <div class="card-body">
          <br />
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Hospital number</th>
                <th scope="col">CODE</th>
                <th scope="col">??????????????????</th>
                <th scope="col">??????????????????????????????????????????????????????</th>
                <th scope="col">??????????????????????????????????????????</th>
                <th scope="col">??????????????????????????????????????????</th>
                <th scope="col">????????????????????????????????????????????????</th>
                <th scope="col">????????????????????????????????????????????????????????????</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              include('Dbconnects.php'); 
              
              $query = "SELECT o.* 
                      FROM ordermed as o
                      ORDER BY o.or_HN
                      INNER JOIN patient as p ON o.or_HN= p.member_HN 
                    ON patient.
                      member_HN = ordermed.or_HN";
              $result=mysqli_query($connect,$sql);

              ?>
              <tr>
                <td> <a href="#" class="btnRemoveAction"> <img src="/img/cut.png" alt="Remove Item" width="30" height="32" /></a>
                </td>
                <td> <?php echo $row["or_HN"] ;?> </td>
                <td> <?php echo $row["or_code"] ;?> </td>
                <td> <?php echo $row["or_n"] ;?> </td>
              </tr>
            </tbody>
          </table>

          <div class="center-align">
            <button type="submit" class="btn btn-coler">SAVE</button>
            <a href="/html/table.html" class="nav-link">Preview</a>
          </div>
        </div>
      </div>
      <br /><br />
    </div> -->

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
