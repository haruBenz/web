<?php
require("Dbconnects.php");
$member_HN=$_GET["HN"];

$sql="SELECT * FROM patient WHERE member_HN =$member_HN";

$result=mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($result);

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
        <a class="navbar-brand" href="/html/web.html"
          ><img
            src="/img/heart.png"
            alt=""
            width="60"
            height="48"
            class="d-inline-block align-text-top"
          />Cardiac center</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a
              class="nav-link active"
              aria-current="page"
              href="/php/insertForm.php"
              >Register</a
            >
            <a class="nav-link" href="/html/order.html">Order</a>
            <a class="nav-link" href="/php/patients-lits.php">Patient list</a>
            <a class="nav-link" href="/php/medication.php"
              >Medication history</a
            >
          </div>
        </div>
      </div>
    </nav>
    <h1 class="center-align">แบบฟอร์มแก้ไขข้อมูลผู้ป่วย</h1>
    <div class="container">
      <div class="card">
        <div class="card-body">
          <form action="updatetData.php" method="POST">
            <div class="row mb-3">
              <label for="inputText1" class="col-sm-2 col-form-label">HN</label>
              <div class="col-sm-10">
                <input type="text" 
                class="form-control" 
                id="inputText1" 
                name="member_HN"
                value="<?php  echo $row["member_HN"];?>"
                />
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText2" class="col-sm-2 col-form-label"
                >Firstname</label
              >
              <div class="col-sm-10">
                <input type="text" 
                class="form-control" 
                id="inputText2" 
                name="member_fname"
                value="<?php  echo $row["member_fname"];?>"
                />
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText2" class="col-sm-2 col-form-label"
                >Surname</label
              >
              <div class="col-sm-10">
                <input type="text" 
                class="form-control" 
                id="inputText2" 
                name="member_lname"
                value="<?php  echo $row["member_lname"];?>"
                />
              </div>
            </div>
            <div class="row mb-3">
              <div class="row">
                <label class="col-form-label col-sm-2 pt-0" for="member_gender">Gender</label>
                <div class="col-sm-10">
                  <div class="form-check" >
                 
                    <?php
                    if($row["member_gender"] == "Male"){
                      echo "<input type='radio' name='member_gender' value='Male' class='form-check-input'checked>Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                      echo  "<input type='radio' name='member_gender' value='Female' class='form-check-input'>Female";
                    }else{ 
                      echo "<input type='radio' name='member_gender' value='Male' class='form-check-input' >Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                      echo "<input type='radio' name='member_gender' value='Female' class='form-check-input' checked>Female";
                    }
                    ?>

                  </div>
                </div>

              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText3" class="col-sm-2 col-form-label"
                >Birth</label
              >
              <div class="col-sm-10">
                <input type="date" 
                class="form-control" 
                id="inputText3" 
                name="member_birth" 
                value="<?php  echo $row["member_birth"];?>"
                />
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
                name="member_age"
                value="<?php  echo $row["member_age"];?>"
                />
              </div>
            </div>
            <div class="center-align">
              <input type="submit" value="อัปเดตข้อมูล" class="btn btn-success">
              <input type="reset" value="ล้างข้อมูล" class="btn btn-danger">
              <a href="patients-lits.php" class="btn btn-secondary">กลับหน้าก่อนนี้</a>
            </div>
            
          </form>
        </div>
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
    <script>function myFunction() {document.getElementById("myRadio").disabled = true;}
  </script>
  </body>
</html>