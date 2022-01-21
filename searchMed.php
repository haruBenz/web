<?php
require('Dbconnects.php');
$member_HN=$_GET["HN"];

$name= $_POST["medname"];
$sql = "SELECT * FROM medicine WHERE med_n LIKE '%$name%' ORDER BY med_code ASC";
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
            <li class="nav-item ">
              <a class="nav-link" href="insertForm.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="update.php">Update</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link active" href="patients-lits.php">Patient List</a>
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
                
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    

    <h2 class="center-align">รายการยา</h2>
    <div class="container">
      <div class="card">
        <div class="card-body">
        <div class="card-body">
       
        
        <form action="searchMed.php?HN=<?php echo $row["member_HN"];?>" class="form-group" method=POST>
             <div class="row mb-3">
              <div class="row">
                <label for="inputText1" class="col-sm-1 col-form-label">ค้นหา</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="ป้อนโค้ดหรือชื่อยา" name = "medname" >
                  <!-- <input type="submit" value="Search" class="btn btn-dark my-2"> -->
                  <input type=button onClick="window.history.back()" value="กลับหน้าก่อนนี้" class="btn btn-secondary">
                </div>
                </div>
            </div>
        </form>
        
        <!-- <form action="add2.php" class="row g-3" method="POST">
        <?php
              foreach ($result as $row) {?>
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
              <label for="inputEmail4" class="form-label">ชื่อยา</label>
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
              <label for="">ช่วงที่รับประทาน</label>
              <input type="checkbox" name="or_time[]" id="" value="ก่อนอาหาร">ก่อนอาหาร
              <input type="checkbox" name="or_time[]" id="" value="หลังอาหาร">หลังอาหาร
              <input type="checkbox" name="or_time[]" id="" value="ก่อนนอน">ก่อนนอน
            </div>
            <div class="from-group">
              <label for="">ความถี่ต่อวัน</label>
              <input type="checkbox" name="or_ptime[]" id="" value="เช้า">เช้า
              <input type="checkbox" name="or_ptime[]" id="" value="กลางวัน">กลางวัน
              <input type="checkbox" name="or_ptime[]" id="" value="เย็น">เย็น
              <input type="checkbox" name="or_ptime[]" id="" value="0">-
            </div>
            <div class="col-md-4">
              <label for="inputEmail4" class="form-label">จำนวนยาทั้งหมด</label>
              <input
                type="number"
                class="form-control"
                id="inputText"
                name="or_tt"
              />
            </div>
            <div class="col-md-4">
              <label for="inputEmail4" class="form-label">จำนวนรับประทานต่อครั้ง</label>
              <input
                type="number"
                class="form-control"
                id="inputText"
                name="or_day"
              />
            </div>
            <div class="center-align">
              <button type="submit" value="add" class="btn btn-primary btn-last">ACCEPT</button>
            </div>
            <?php } ?> 
        </form> -->
        
        

        <table class="table table-hover">
              <thead>
              <tr>
                <th scope="col">Hospital number</th>
                <th scope="col">CODE</th>
                <th scope="col">ชื่อยา</th>
                <th scope="col">ช่วงที่รับประทาน</th>
                <th scope="col">ความถี่ต่อวัน</th>
                <th scope="col">จำนวนยาทั้งหมด</th>
                <th scope="col">จำนวนรับประทานต่อครั้ง</th>
                <th scope="col">ADD</th>
              </tr>
            </thead>
             
            <?php
              foreach ($result as $row) {?>
            
              <tr>
              <form action="add2.php" method="POST">
                <td><input type="text" name="or_HN"></td>
                <td><input type="text" value="<?php echo $row["med_code"] ;?>" name="or_code" readonly></td>
                <td><input type="text" value="<?php echo $row["med_n"] ;?>" name="or_n" readonly></td>
                <td><label for="">ช่วงที่รับประทาน</label>
              <input type="checkbox" name="or_time[]" id="" value="ก่อนอาหาร">ก่อนอาหาร
              <input type="checkbox" name="or_time[]" id="" value="หลังอาหาร">หลังอาหาร
              <input type="checkbox" name="or_time[]" id="" value="ก่อนนอน">ก่อนนอน</td>
                 <td><label for="">ความถี่ต่อวัน</label>
              <input type="checkbox" name="or_ptime[]" id="" value="เช้า">เช้า
              <input type="checkbox" name="or_ptime[]" id="" value="กลางวัน">กลางวัน
              <input type="checkbox" name="or_ptime[]" id="" value="เย็น">เย็น
              <input type="checkbox" name="or_ptime[]" id="" value="0">-</td>
                <td><input type="number" name="or_tt"/></td>
                <td><input type="number" name="or_day"></td>
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
                      <th scope="col">ชื่อยา</th>
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
                >วันละ (เม็ด/ครั้ง)</label
              >
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputText" />
              </div>
              <label for="inputText3" class="col-sm-1 col-form-label label-1"
                >เวลา</label
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
