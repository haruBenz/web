<?php
require('Dbconnects.php');
$name= $_POST["ptname"];
$sql = "SELECT * FROM patient WHERE member_fname LIKE '%$name%' ORDER BY member_HN ASC";
$result=mysqli_query($connect,$sql);

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
            <a class="nav-link" href="/php/insertForm.php">Register</a>
            <a class="nav-link" href="/html/order.html">Order</a>
            <a
              class="nav-link active"
              aria-current="page"
              href="php/patients-lits.php"
              >Patient list</a
            >
            <a class="nav-link" href="/php/medication.php"
              >Medication history</a
            >
          </div>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="col">
        <div class="row g-3">
          <label for="exampleFormControlInput1" class="form-label"
            >รายชื่อผู้ป่วยโรคหัวใจล้มเหลว</label
          >
          <hr>
         
          <form action="searchData.php" class="form-group" method=POST>
            <label for="">ชื่อผู้ป่วยโรคหัวใจล้มเหลว</label>
            <input type="text" placeholder="ป้อนชื่อผู้ป่วย" name="ptname" class="form-contorl">
            <input type="submit" value="Search" class="btn btn-dark my-2">
            <a href="patients-lits.php" class="btn btn-secondary">กลับหน้าก่อนนี้</a>
          </form>

          <table class="table table-hover">
          <thead>
              <tr>
                <th scope="col">HN</th>
                <th scope="col">ชื่อ</th>
                <th scope="col">นามสกุล</th>
                <th scope="col">Status</th>
                <th scope="col">สั่งยา</th>
                <th scope="col">ข้อมูล</th>
                <th scope="col">แก้ไขข้อมูล</th>
                <th scope="col">ลบข้อมูล</th>
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
                      >ยืนยันการกินยา</span
                    >
                  </h5>
                </td>
                <td> <a href="order.php?HN=<?php echo $row["member_HN"];?>" class="btn btn-warning">สั่งยา</a> </td>
                <td> <a href="medica.php?HN=<?php echo $row["member_HN"];?>" class="btn btn-info">ข้อมูล</a> </td>
                <td>
                  <a href="editForm.php?HN=<?php echo $row["member_HN"];?>" class="btn btn-primary">แก้ไข</a>
                  </td>
                <td>
                  <a href="deleteQueryString.php?idpt=<?php echo $row["member_HN"] ;?>" 
                  class="btn btn-danger"
                  onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่')"
                  >ลบข้อมูล</a>
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
