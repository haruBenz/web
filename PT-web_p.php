<?php
require('Dbconnects.php');

    session_start();

    if (!isset($_SESSION['member_HN'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: PTsignIN.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['member_HN']);
        header('location: PTsignIN.php');
    }

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cardiac center</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
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
    <link rel="stylesheet" href="/css/styles_web_p.css" />
    <script src="web_p.js" defer></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="PT-web_p.php"
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
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="PT-web_p.php"
                >Home</a
              >
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="form.html">Form</a>
            </li> -->
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
                      <?php if (isset($_SESSION['member_HN'])) : ?>
                      <a href="PT-web_p.php?logout='1'">Logout</a>
                      <?php endif ?>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
          <!-- <form class="d-flex">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn btn-first btn-warning" type="submit">
              Search
            </button>
          </form> -->
        </div>
      </div>
    </nav>

    <div class="row">
   <div class="card information">
    <p class="card-title-head"><b>ข้อมูลผู้ป่วย</b></p>
    <?php require('Dbconnects.php');
      $member_HN=$_GET["HN"];
      $sql="SELECT * FROM patient WHERE member_HN =$member_HN";
      $result=mysqli_query($connect,$sql);
      $row=mysqli_fetch_assoc($result);
      ?>
    
      <div class="col-sm-8">
        <div class="card Layout-information">
          <div class="card-body">
            <form class="row gap-3">
              <div class="col-auto">
                <label for="label_HN">รหัสผู้ป่วย :</label>
                <input readonly 
                  placeholder="รหัส"
                  id="lebel_HN"
                  type="text"
                  v-model="HN"
                  name="member_HN" 
                  value="<?php echo $row['member_HN'] ;?>"
                />
              </div>
              <div class="row gap-3">
                <div class="col-auto">
                  <label for="label_patientname">ชื่อผู้ป่วย :</label>
                  <input
                    placeholder="ชื่อผู้ป่วย"
                    id="lebel_patientname"
                    type="text"
                    v-model="patientname"
                    name="member_fname" 
                    value="<?php echo $row["member_fname"] ;?>"
                  />
                </div>
                <div class="col-sm-6">
                  <label for="label_patientname">นามสกุลผู้ป่วย :</label>
                  <input
                    placeholder="นามสกุลผู้ป่วย"
                    id="lebel_patientname"
                    type="text"
                    v-model="patientname"
                    name="member_lname" 
                    value="<?php echo $row["member_lname"] ;?>"
                  />
                </div>
              </div>
              <div class="row gap-3">
                <div class="col-auto">
                  <label for="label_patientname">เพศ :</label>
                  <input
                    placeholder="เพศ"
                    id="lebel_gender"
                    type="text"
                    v-model="gender"
                    name="member_genger" 
                    value="<?php echo $row["member_gender"] ;?>"
                  />
                </div>
                <div class="col-auto">
                  <label for="label_date">วันเกิด :</label>
                  <input
                    placeholder="วัน/เดือน/ปี"
                    id="lebel_date"
                    type="text"
                    v-model="date"
                    name="member_birth" 
                    value="<?php echo $row["member_birth"] ;?>"
                  />
                </div>
                <div class="col-auto">
                  <label for="label_age">อายุ :</label>
                  <input
                    placeholder="อายุ"
                    id="lebel_age"
                    type="number"
                    v-model="age"
                    name="member_age" 
                    value="<?php echo $row["member_age"] ;?>"
                  />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      </div>
      </div>

      

<div class="row">
        <div class="card information col-sm-7">
          <p class="card-title-head"><b>ตารางการรับประทานยาของผู้ป่วย</b></p>
          <table class="table">
            <thead>
            <?php 
            include('Dbconnects.php');         
            $query = "SELECT o.*,p.member_HN 
                      FROM ordermed as o
                      INNER JOIN patient as p ON o.or_HN= p.member_HN 
                      ORDER BY o.or_HN ASC"
                      or die ("Error Query [".$query."]");
            ?>
              <tr>
                <td class="align-middle" colspan="2" rowspan="2">ช่วงเวลา</td>
                <td class="align-middle" colspan="2">
                  <script language="javascript">
                    now = new Date();
                    var thday = new Array(
                      "อาทิตย์",
                      "จันทร์",
                      "อังคาร",
                      "พุธ",
                      "พฤหัส",
                      "ศุกร์",
                      "เสาร์"
                    );
                    var thmonth = new Array(
                      "มกราคม",
                      "กุมภาพันธ์",
                      "มีนาคม",
                      "เมษายน",
                      "พฤษภาคม",
                      "มิถุนายน",
                      "กรกฎาคม",
                      "สิงหาคม",
                      "กันยายน",
                      "ตุลาคม",
                      "พฤศจิกายน",
                      "ธันวาคม"
                    );
                    document.write(
                      "วัน" +
                        thday[now.getDay()] +
                        "ที่ " +
                        now.getDate() +
                        " " +
                        thmonth[now.getMonth()] +
                        " " +
                        (1900 + now.getYear() + 543)
                    );
                  </script>
                </td>
              </tr>
              <tr>
                <td class="align-middle">รายการยา</td>
                <td class="align-middle">ครั้งละกี่เม็ด</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="align-middle" rowspan="2">เช้า</td>
                <td class="align-middle">ก่อนอาหาร</td>
                <td class="align-middle">
                  <div class="information-popup">
                    <a
                      href="#"
                      onclick="document.getElementById('id10').style.display='block'"
                      class=""
                      >ยาขับปัสสาวะ</a
                    >
                    <div id="id10" class="w3-modal">
                      <div
                        class="w3-modal-content w3-card-4 w3-animate-zoom"
                        style="max-width: 800px"
                      >
                        <div class="w3-center">
                          <br />
                          <span
                            onclick="document.getElementById('id10').style.display='none'"
                            class="
                              w3-button w3-xlarge w3-hover-red w3-display-topright
                            "
                            title="Close Modal"
                            >&times;</span
                          >
                          <h5>ข้อมูลยา</h5>
                        </div>
                        <form class="w3-container">
                          <div class="w3-section">
                            <div class="item-information">
                              <label class="w3-margin-bottom col-auto"
                                ><b>ชื่อยา:</b></label
                              >
                              <div class="information-text">
                                <p>Furosemide Tab 40 mg</p>
                              </div>
                            </div>
                            <div class="img-medicine">
                              <!-- <img
                                src="Furetic-Big.jpg"
                                alt="logo"
                                style="width: 20%"
                                class="w3-margin-top"
                              /> -->
                              <!-- <img
                                src="Furetic-Small.png"
                                alt="logo"
                                style="width: 40%"
                                class="w3-margin-top"
                              /> -->
                            </div>
                            <div class="item-information">
                              <label class="w3-margin-bottom col-auto"
                                ><b>สรรพคุณของยา:</b></label
                              >
                              <div class="information-text">
                                <p>ขับปัสสาวะ ลดอาการบวมน้ำ และลดความดันโลหิต</p>
                              </div>
                            </div>
                            <div class="item-information">
                              <label class="w3-margin-bottom col-auto"
                                ><b>ผลข้างเคียง:</b></label
                              >
                              <div class="information-text">
                                <p>
                                  - อาจทำให้เกิดอาการไม่พึ่งประสงค์ได้แก่
                                  หัวใจเต้นผิดจังหวะ ความดันต่ำในขณะเปลี่ยนท่าทาง
                                  ปฎิกิริยาผื่นแพ้ทางผิวหนัง
                                </p>
                                <p>
                                  - อาจทำให้เกิดอาการปวดเกร็งกระเพาะปัสสาวะขึ้นได้
                                </p>
                                <p>
                                  - อาจทำให้เกิดโรคสมองจากโรคตับได้
                                  ถ้าผู้ป่วยใช้ยานี้ในขณะที่มีอาการของโรคตับขั้นรุนแรง
                                  และทำให้เกิดภาวะดีซ่าน
                                </p>
                              </div>
                            </div>
                            <div class="item-information">
                              <label class="w3-margin-bottom col-auto"
                                ><b>คำเตือน:</b></label
                              >
                              <div class="information-text">
                                <p>
                                  - ผู้แพ้ยาหรือส่วนประกอบของยาFurosemide หรือ
                                  แพ้sulfonylurea ไม่ควรใช้ยานี้
                                </p>
                                <p>
                                  -
                                  ห้ามใช้ในผู้ป่วยที่มีภาวะปัสสาวะออกน้อยผิดปกติ(anuria)
                                </p>
                                <p>
                                  - ผู้ที่มีภาวะ hepatic coma
                                  หรือภาวะขาดน้ำอย่างรุนแรง
                                </p>
                                <p>- ระมัดระวังการใช้ยานี้ในผู้ป่วยโรคไตเรื้อรัง</p>
                                <p>
                                  - หลีกเลี่ยงการใช้ยานี้ร่วมกับยาฆ่าเชื้อกลุ่ม
                                  aminoglycosides พร้อมกัน
                                </p>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </td>
                <td class="align-middle">
                  <input type="text" id="setnumber1" class="w3-input w3-margin-bottom setnumber">
                  </input>
                </td>
              </tr>
              <tr>
                <td class="align-middle">หลังอาหาร</td>
                <td class="align-middle"></td>
                <td class="align-middle">
                  <input type="text" id="setnumber2" class="w3-input w3-margin-bottom setnumber">
                  </input>
                </td>
              </tr>
              <tr>
                <td class="align-middle" rowspan="2">กลางวัน</td>
                <td class="align-middle">ก่อนอาหาร</td>
                <td class="align-middle"></td>
                <td class="align-middle">
                  <input type="text" id="setnumber3" class="w3-input w3-margin-bottom setnumber">
                  </input>
                </td>
              </tr>
              <tr>
                <td class="align-middle">หลังอาหาร</td>
                <td class="align-middle"></td>
                <td class="align-middle">
                  <input type="text" id="setnumber4" class="w3-input w3-margin-bottom setnumber">
                  </input>
                </td>
    
              </tr>
              <tr>
                <td class="align-middle" rowspan="2">เย็น</td>
                <td class="align-middle">ก่อนอาหาร</td>
                <td class="align-middle"></td>
                <td class="align-middle">
                  <input type="text" id="setnumber5" class="w3-input w3-margin-bottom setnumber">
                  </input>
                </td>
              </tr>
              <tr>
                <td class="align-middle">หลังอาหาร</td>
                <td class="align-middle"></td>
                <td class="align-middle">
                  <input type="text" id="setnumber6" class="w3-input w3-margin-bottom setnumber">
                  </input>
                </td>
              </tr>
              <tr>
                <td class="align-middle" colspan="2">ก่อนนอน</td>
                <td class="align-middle"></td>
                <td class="align-middle">
                  <input type="text" id="setnumber7" class="w3-input w3-margin-bottom setnumber">
                  </input>
                </td>
              </tr>
            </tbody>
          </table>
          <br />
        </div>
        <div class="col-sm-3">
          <label class="w3-margin-bottom card-title-head_1"><b>วิธีปฎิบัติตัวกรณีลืมรับประทานยา</b></label>
          <div class="card_1">
            <label class="information_1"><b>กรณีลืมทานยาไม่เกิน 12 ชั่วโมง</b>&nbsp;นับจากเวลาเดิมที่เคยกินให้รีบทานทันทีที่นึกขึ้นได้ในขนาดยาเท่าเดิม</label>
          </div>
          <br/>
          <div class="card_1">
            <label class="information_1"><b>กรณีลืมทานยาเกิน 12 ชั่วโมง</b>&nbsp;ไปแล้วให้ข้ามยามื้อนั้นไปและทานมื้อต่อไปในขนาดเดิม เวลาเดิมโดยไม่ต้องเพิ่มขนาดยาเป็น 2 เท่า</label>
          </div>
          <br/>
          <button type="button" name="print" id="print" class="btn-last" onclick="window.print();">Print</button>
        </div>
      </div>
      <div class="w3-container container">
          <button
            onclick="document.getElementById('id01').style.display='block'"
            class="w3-button w3-green w3-large" id="btn_01"
          >
            ยืนยันการรับประทานยา
          </button>
          <div id="id01" class="w3-modal">
            <div
              class="w3-modal-content w3-card-4 w3-animate-zoom"
              style="max-width: 800px"
            >
              <div class="w3-center">
                <br />
                <span
                  onclick="document.getElementById('id01').style.display='none'"
                  class="
                    w3-button w3-xlarge w3-hover-red w3-display-topright
                  "
                  title="Close Modal"
                  >&times;</span
                >
                <img
                  src="/img/logo_popup.png"
                  alt="logo"
                  style="width: 40%"
                  class="w3-circle w3-margin-top"
                />
              </div>
              <form class="w3-container" >
                <div class="w3-section">
                  <label class="w3-margin-bottom"
                    ><b>ยืนยันการรับประทานยา</b></label
                  >
                  <br/>
                  <hr/>
                    <p id="quantity1-error"></p>
                    <divs class="row row-cols-lg-auto input-from">
                      <input
                        class="w3-input w3-border w3-margin-bottom sizetext"
                        type="text"
                        placeholder="รายการยา"
                        name="name"
                        id="name"
                        required
                      />
                      <label class="text">จำนวน</label>
                      <input
                        class="w3-input w3-border w3-margin-bottom"
                        type="number"
                        id="quantity1"
                        name="quantity1"
                        min="0"
                        max="5"
                        required
                      />
                      <label class="text">เม็ด/ครั้ง</label>
                      <label class="text">หมายเหตุ :</label>
                      <input
                        class="w3-input w3-margin-bottom sizetextResult"
                        type="text" id="Result" name="Result1"
                      />
                    </div>
                    <p id="quantity2-error"></p>
                    <div class="row row-cols-lg-auto input-from">
                      <input
                        class="w3-input w3-border w3-margin-bottom sizetext"
                        type="text"
                        placeholder="รายการยา"
                        name="name"
                        id="name"
                        required
                      />
                      <label class="text">จำนวน</label>
                      <input
                        class="w3-input w3-border w3-margin-bottom"
                        type="number"
                        id="quantity2"
                        name="quantity2"
                        min="0"
                        max="5"
                        required
                      />
                      <label class="text">เม็ด/ครั้ง</label>
                      <label class="text">หมายเหตุ :</label>
                      <input
                        class="w3-input w3-margin-bottom sizetextResult"
                        type="text" id="Result2" name="Result2"
                      />
                    </div>
                    <hr/>
                    <p id="quantity3-error"></p>
                    <div class="row row-cols-lg-auto input-from">
                      <input
                        class="w3-input w3-border w3-margin-bottom sizetext"
                        type="text"
                        placeholder="รายการยา"
                        id="name"
                        name="name"
                        required
                      />
                      <label class="text">จำนวน</label>
                      <input
                        class="w3-input w3-border w3-margin-bottom"
                        type="number"
                        id="quantity3"
                        name="quantity3"
                        min="0"
                        max="5"
                        required
                      />
                      <label class="text">เม็ด/ครั้ง</label>
                      <label class="text">หมายเหตุ :</label>
                      <input
                        class="w3-input w3-margin-bottom sizetextResult"
                        type="text"
                      />
                    </div>
                    <p id="quantity4-error"></p>
                    <div class="row row-cols-lg-auto input-from">
                      <input
                        class="w3-input w3-border w3-margin-bottom sizetext"
                        type="text"
                        placeholder="รายการยา"
                        id="name"
                        name="name"
                        required
                      />
                      <label class="text">จำนวน</label>
                      <input
                        class="w3-input w3-border w3-margin-bottom"
                        type="number"
                        id="quantity4"
                        name="quantity4"
                        min="0"
                        max="5"
                        required
                      />
                      <label class="text">เม็ด/ครั้ง</label>
                      <label class="text">หมายเหตุ :</label>
                      <input
                        class="w3-input w3-margin-bottom sizetextResult"
                        type="text"
                      />
                    </div>
                    <hr/>
                    <p id="quantity5-error"></p>
                    <div class="row row-cols-lg-auto input-from">
                      <input
                        class="w3-input w3-border w3-margin-bottom sizetext"
                        type="text"
                        placeholder="รายการยา"
                        id="name"
                        name="name"
                        required
                      />
                      <label class="text">จำนวน</label>
                      <input
                        class="w3-input w3-border w3-margin-bottom"
                        type="number"
                        id="quantity5"
                        name="quantity5"
                        min="0"
                        max="5"
                        required
                      />
                      <label class="text">เม็ด/ครั้ง</label>
                      <label class="text">หมายเหตุ :</label>
                      <input
                        class="w3-input w3-margin-bottom sizetextResult"
                        type="text"
                      />
                    </div>
                    <p id="quantity6-error"></p>
                    <div class="row row-cols-lg-auto input-from">
                      <input
                        class="w3-input w3-border w3-margin-bottom sizetext"
                        type="text"
                        placeholder="รายการยา"
                        id="name"
                        name="name"
                        required
                      />
                      <label class="text">จำนวน</label>
                      <input
                        class="w3-input w3-border w3-margin-bottom"
                        type="number"
                        id="quantity6"
                        name="quantity6"
                        min="0"
                        max="5"
                        required
                      />
                      <label class="text">เม็ด/ครั้ง</label>
                      <label class="text">หมายเหตุ :</label>
                      <input
                        class="w3-input w3-margin-bottom sizetextResult"
                        type="text"
                      />
                    </div>
                    <hr/>
                    <p id="quantity7-error"></p>
                    <div class="row row-cols-lg-auto input-from">
                      <input
                        class="w3-input w3-border w3-margin-bottom sizetext"
                        type="text"
                        placeholder="รายการยา"
                        id="name"
                        name="name"
                        required
                      />
                      <label class="text">จำนวน</label>
                      <input
                        class="w3-input w3-border w3-margin-bottom"
                        type="number"
                        id="quantity7"
                        name="quantity7"
                        min="0"
                        max="5"
                        required
                      />
                      <label class="text">เม็ด/ครั้ง</label>
                      <label class="text">หมายเหตุ :</label>
                      <input
                        class="w3-input w3-margin-bottom sizetextResult"
                        type="text"
                      />
                    </div>
                    <label class="w3-margin-bottom"
                    ><b>ถ่ายรูปยา (ให้เห็นจำนวนยาที่อยู่ภายในซอง)</b></label
                    >
                    <div class="from-group">
                      <input
                      type="file"
                      class="from-control-file"
                      id="exampleFromControlFile1"
                      
                      />
                    </div>
                    <label class="w3-margin-bottom"
                    ><b>กรณีลืมรับประทานยา</b></label
                    >
                    <div class="form-check">
                      <label class="w3-margin-bottom">
                      ระยะเวลาที่ลืมรับประทานยา :
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" class="form-check-input" name="lost"></input>
                      <label class="form-check-label">
                      ลืมทานยาไม่เกิน 12 ชั่วโมง
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" class="form-check-input" name="lost"></input>
                      <label class="form-check-label">
                      ลืมทานยาเกิน 12 ชั่วโมง
                      </label>
                      <br/>
                      <label class="w3-margin-bottom">
                      จำนวนความถี่ :
                      </label>
                      <input type="text" class="sizetextHz"></input>
                    </div>
                    <label class="w3-margin-bottom"
                    ><b>บันทึกประจำวัน</b></label
                    >
                    <p class="card-text">*จดบันทึกทุกครั้งที่ลืมรับประทานยา</p>
                    <div class="row row-cols-lg-auto input-from">
                      <input
                      class="w3-input w3-border w3-margin-bottom sizetextcomment"
                      type="text"
                      />
                    </div>
                    <button
                    class="
                    w3-button w3-block w3-green w3-section w3-padding
                    "
                    type="submit" name="submit" id="btn" 
                    >
                    บันทึก
                  </button>
                </div>
                <div
                class="
                w3-container w3-border-top w3-padding-16 w3-light-grey
                "
                >
                <button
                onclick="document.getElementById('id01').style.display='none'"
                type="button"
                class="w3-button w3-red "
                >
                Cancel
                </button>
                </div>
              </form>
            </div>
          </div>
        </div>


    <br />

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