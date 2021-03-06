<?php
require('Dbconnects.php');

$sql = "SELECT * FROM patient ORDER BY member_HN ASC";
$result=mysqli_query($connect,$sql);

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
    <link rel="stylesheet" href="/css/styles_patient.css" />
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="/php/insertForm.php"
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
              <a class="nav-link active" href="patients-lits.php">Patient List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/php/order.php">Order</a>
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
                      <a href="patients-lits.php?logout='1'">Logout</a>
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

    <div class="container">
      <div class="col">
        <div class="row g-3">
          <label for="exampleFormControlInput1" class="form-label"
            >???????????????????????????????????????????????????????????????????????????????????????</label
          >
          <hr>
         
          <form action="searchData.php" class="form-group" method=POST>
            <label for="">??????????????????????????????????????????????????????????????????????????????</label>
            <input type="text" placeholder="?????????????????????????????????????????????" name="ptname" class="form-contorl">
            <input type="submit" value="Search" class="btn btn-dark my-2">
          </form>

          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">HN</th>
                <th scope="col">????????????</th>
                <th scope="col">?????????????????????</th>
                <th scope="col">Status</th>
                <!-- <th scope="col">??????????????????</th> -->
                <th scope="col">??????????????????</th>
                <th scope="col">?????????????????????????????????</th>
                <th scope="col">????????????????????????</th>
              </tr>
            </thead>
            <tbody>
              <?php  while($row=mysqli_fetch_assoc($result)){?>
              <tr>
                <td> <?php echo $row["member_HN"] ;?> </a>  </td>
                <td> <?php echo $row["member_fname"] ;?>  </td>
                <td> <?php echo $row["member_lname"] ;?> </td>
                <td>
                  <h5>
                    <span class="badge rounded-pill bg-colergreen"
                      >??????????????????????????????????????????</span
                    >
                  </h5>
                </td>
                <!-- <td> <a href="order.php?HN=<?php echo $row["member_HN"];?>" class="btn btn-warning">??????????????????</a> </td> -->
                <td> <a href="medica.php?HN=<?php echo $row["member_HN"];?>" class="btn btn-info">??????????????????</a> </td>
                <td>
                  <a href="editForm.php?HN=<?php echo $row["member_HN"];?>" class="btn btn-primary">???????????????</a>
                  </td>
                <td>
                  <a href="deleteQueryString.php?HN=<?php echo $row["member_HN"] ;?>" 
                  class="btn btn-danger"
                  onclick="return confirm('???????????????????????????????????????????????????????????????????????????')"
                  >????????????????????????</a>
                </td>
              </tr>
              <?php } ?>
              
            </tbody>
          </table>
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
