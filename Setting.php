<?php include('server.php');
session_start();

$select = mysqli_query($conn, "SELECT * FROM `member` WHERE member_id = '" . $_SESSION['id'] . "'") or die('query failed');
if (mysqli_num_rows($select) > 0) {
  ($row = mysqli_fetch_assoc($select)); {
?>

    <!DOCTYPE html>
    <html style="font-size: 16px;" lang="en">

    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta charset="utf-8">
      <meta name="keywords" content="">
      <meta name="description" content="">
      <title>บัญชีธนาคาร</title>
      <link rel="stylesheet" href="nicepage.css" media="screen">
      <meta name="theme-color" content="#478ac9">
      <meta property="og:title" content="บัญชีธนาคาร">
      <meta property="og:type" content="website">
      <meta data-intl-tel-input-cdn-path="intlTelInput/">
      <link rel="stylesheet" href="style.css">

    </head>

    <body class="">
      <?php include 'header.php'; ?>
      <style>
        /* CSS for all pages */
        .page {
          display: none;
        }

        /* CSS for active page */
        .active {
          display: block;
        }

        .bold-on-click {
          font-weight: normal;
          /* ตั้งค่าเริ่มต้นเป็นตัวธรรมดา */
        }

        .bold-on-click:hover {
          font-weight: bold;
          /* เปลี่ยนเป็นตัวหนาเมื่อผู้ใช้เมาส์ชี้ไปที่ตัวอักษร */
        }

        .bold {
          font-weight: bold;
        }
      </style>

      <div class=" m-8 rounded-md flex flex-row mb-20">
        <div class="bg-slate-800  rounded-l-lg drop-shadow-lg" style="height:auto;width: 300px;">
          <div class="border border-1 shadow-md ml-28 mt-12 rounded-full" style="width: 80px;height: 80px;">
            <img class="" src="images/logo.png">
          </div>
          <div class="  flex flex-col  mt-16 gap-y-6 ml-5 text-center  ">
            <button id="button1" class="bold-on-click text-white border-2 border-slate-50 rounded-md" style="width: 200px; height: 30px;">ประวัติ</button>
            <button id="button3" class="bold-on-click text-white border-2 border-slate-50 rounded-md" style="width: 200px; height: 30px;">ที่อยู่</button>
            <button id="button4" class="bold-on-click text-white border-2 border-slate-50 rounded-md" style="width: 200px; height: 30px;">เปลี่ยนรหัสผ่าน</button>
          </div>
        </div>
        <div class="">
          <div id="page1" class=" bg-white  flex  justify-center   page active rounded-r-lg  border-2 border-stone-800 drop-shadow-lg  " style="width:1200px; height: auto;">
            <form method="post" enctype="multipart/form-data" class="  ml-56">

              <?php
              if (isset($_POST['updatemember'])) {
                $m_name = $_POST['name'];
                $m_firstname = $_POST['firstname'];
                $m_lastname = $_POST['lastname'];
                $m_email = $_POST['email'];
                $m_mobile = $_POST['mobile'];
                $m_gender = $_POST['gender'];
                $m_birthday = $_POST['birthday'];

                $update_query = mysqli_query($conn, "UPDATE `member` SET `member_name`='$m_name',`member_firstname`='$m_firstname',
`member_lastname`='$m_lastname',`member_email`='$m_email',`member_mobile`='$m_mobile',`member_gender`='$m_gender',
`member_birthday`='$m_birthday' WHERE member_id = '" . $_SESSION['id'] . "'") or die('query failed');
              }
              ?>

              <?php
              //ดึงข้อมูลในตาราง product มาแสดง
              $select = mysqli_query($conn, "SELECT * FROM `member` WHERE member_id = '" . $_SESSION['id'] . "'") or die('query failed');

              //ถ้าจำนวนแถวในตารางproductมากกว่า 0 ก็ให้ดึงแถวในตารางมาแสดง
              if (mysqli_num_rows($select) > 0) {
                ($row = mysqli_fetch_assoc($select)); {
              ?>

                  <div class=" rounded-md flex justify-center " style="width:600px; height: auto; margin: 10px;">

                    <div class="flex flex-col   gap-y-4"  >

                      <div>
                        <label class=" text-black">ชื่อผู้ใช้</label>
                        <input type="text" name="name" value="<?php echo $row['member_name']; ?>" class="block w-full px-4 py-2 mt-2 text-black bg-white border border-gray-300 rounded-md   dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                      </div>
                      <div>
                        <label class=" text-black">ชื่อ</label>
                        <input type="text" name="firstname" value="<?php echo $row['member_firstname']; ?>" class="block w-full px-4 py-2 mt-2 text-black bg-white border border-gray-300 rounded-md   dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                      </div>
                      <div>
                        <label class=" text-black">นามสกุล</label>
                        <input type="text" name="lastname" value="<?php echo $row['member_lastname']; ?>" class="block w-full px-4 py-2 mt-2 text-black bg-white border border-gray-300 rounded-md   dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                      </div>
                      <div>
                        <label class=" text-black">อีเมล</label>
                        <input type="text" name="email" value="<?php echo $row['member_email']; ?>" class="block w-full px-4 py-2 mt-2 text-black bg-white border border-gray-300 rounded-md   dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                      </div>
                      <div>
                        <label class=" text-black">หมายเลขโทรศัพท์</label>
                        <input type="text" name="mobile" value="<?php echo $row['member_mobile']; ?>" class="block w-full px-4 py-2 mt-2 text-black bg-white border border-gray-300 rounded-md   dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                      </div>
                      <div>
                        <label class=" text-black">เพศ</label>
                        <input type="text" name="gender" value="<?php echo $row['member_gender']; ?>" class="block w-full px-4 py-2 mt-2 text-black bg-white border border-gray-300 rounded-md   dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                      </div>
                      <div>
                        <label class=" text-black">วัน/เดือน/ปี</label>
                        <input type="text" name="birthday" value="<?php echo $row['member_birthday']; ?>" class="block w-full px-4 py-2 mt-2 text-black bg-white border border-gray-300 rounded-md   dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                      </div>
                      <div class="flex justify-end mt-6">
                        <br></br>
                        <button type="submit" name="updatemember" value="edit" class="px-6 py-2 leading-5 mr-10 text-white transition-colors duration-200 transform bg-green-500 rounded-md  focus:outline-none focus:bg-gray-600">บันทึกข้อมูล</button>
                      </div>
            </form>





        <?php
                }
              }

        ?>




          </div>
        </div>

      </div>

      <!--  -->
      <div class="">
        <div id="page2" class="page ">
          <form method="post" enctype="multipart/form-data">
            <div class="bg-white rounded-md mt-16 flex  justify-center rounded-r-lg  border-2 border-stone-800 drop-shadow-lg" style="width:900px; height: 500px;">

              <div class="flex flex-col justify-center gap-y-4">
                <p class="font-bold text-3xl  mt-4 mb-8 ">บัตรเครดิค / บัตรเดบิต</p>
                <p class="justify-center">
                  <span style="font-size: 1.5rem; font-weight: 700; ">+</span>เพิ่ม บัตรเครดิค / บัตรเดบิต
                </p>
                <p class="font-bold justify-center">บัตรเครดิค / บัตรเดบิตของฉัน</p>
                <p class="justify-center">*ยังไม่ได้เพิ่ม&nbsp;บัตรเครดิค / บัตรเดบิต</p>
                <p class="font-bold justify-center ">บัญชีธนาคารของฉัน</p>
                <p class="justify-center">
                  <span style="font-size: 1.5rem; font-weight: 700;">+</span>เพิ่ม ​บัญชีธนาคาร
                </p>
                <p class="-text-11">*ยังไม่ได้เพิ่ม&nbsp;​บัญชีธนาคาร</p>
              </div>
            </div>
        </div>



        <?php
        //ดึงข้อมูลในตาราง product มาแสดง
        $select = mysqli_query($conn, "SELECT * FROM `member` WHERE member_id = '" . $_SESSION['id'] . "'") or die('query failed');

        //ถ้าจำนวนแถวในตารางproductมากกว่า 0 ก็ให้ดึงแถวในตารางมาแสดง
        if (mysqli_num_rows($select) > 0) {
          ($row = mysqli_fetch_assoc($select)); {

        ?>

            <div id="page3" class="  bg-white   page rounded-r-lg  border-2 border-stone-800 drop-shadow-lg " style="width:1200px; height: auto;">
              <form method="post" enctype="multipart/form-data">

                <?php
                if (isset($_POST['address1'])) {
                  $m_address1 = $_POST['add1'];

                  $update_query = mysqli_query($conn, "UPDATE `member` SET `member_address1`='$m_address1'
  WHERE member_id = '" . $_SESSION['id'] . "'") or die('query failed');
                }
                if (isset($_POST['address2'])) {
                  $m_address2 = $_POST['add2'];

                  $update_query = mysqli_query($conn, "UPDATE `member` SET `member_address2`='$m_address2'
  WHERE member_id = '" . $_SESSION['id'] . "'") or die('query failed');
                }
                if (isset($_POST['address3'])) {
                  $m_address3 = $_POST['add3'];

                  $update_query = mysqli_query($conn, "UPDATE `member` SET `member_address3`='$m_address3'
  WHERE member_id = '" . $_SESSION['id'] . "'") or die('query failed');
                } //address
                ?>

                <!-- ที่อยู่ -->
                <center class="gap-y-4">
                  <div class="  bg-white  rounded-md " style="width:600px; height: auto;">


                    <p class="mt-8 mb-8 text-black font-bold text-3xl flex  justify-center">ที่อยู่ของฉัน</p>
                    <div>
                      <label class=" text-black">ที่อยู่ 1</label>
                      <input type="text" name="add1" value="<?php echo $row['member_address1']; ?>" class="block w-full px-4 py-2 mt-2 text-black bg-white border border-gray-300 rounded-md   dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                      <button type="submit" name="address1" value="edit" class="px-6 py-2 leading-5 mb-5 mt-5 text-white transition-colors duration-200 transform bg-green-500 rounded-md  focus:outline-none focus:bg-gray-600">แก้ไขที่อยู่</button>
                    </div>

                    <div>
                      <label class=" text-black">ที่อยู่ 2</label>
                      <input type="text" name="add2" value="<?php echo $row['member_address2']; ?>" class="block w-full px-4 py-2 mt-2 text-black bg-white border border-gray-300 rounded-md   dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                      <button type="submit" name="address2" value="edit" class="px-6 py-2 leading-5 mb-5 mt-5 text-white transition-colors duration-200 transform bg-green-500 rounded-md  focus:outline-none focus:bg-gray-600">แก้ไขที่อยู่</button>
                    </div>

                    <div>
                      <label class=" text-black">ที่อยู่ 3</label>
                      <input type="text" name="add3" value="<?php echo $row['member_address3']; ?>" class="block w-full px-4 py-2 mt-2 text-black bg-white border border-gray-300 rounded-md   dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                      <button type="submit" name="address3" value="edit" class="px-6 py-2 leading-5 mb-5 mt-5 text-white transition-colors duration-200 transform bg-green-500 rounded-md  focus:outline-none focus:bg-gray-600">แก้ไขที่อยู่</button>
                    </div>
              </form>

            </div>
      </div>
      </center>


  <?php
          }
        }
  ?>

  <!-- เปลี่ยนรหัส -->

  <div id="page4" class="  bg-white flex  justify-center page rounded-r-lg  border-2 border-stone-800 drop-shadow-lg " style="width:1200px; height: auto;">
    <form method="post" enctype="multipart/form-data">
      <?php
      if (isset($_POST['changpassword'])) {
        $m_newpassword = $_POST['newpassword'];
        $m_newpassword1 = $_POST['newpassword1'];
        $m_oldpassword = $_POST['oldpassword'];

        if ($m_oldpassword == $row['member_password']) {

          if ($m_newpassword == $m_newpassword1) {
            $update_query = mysqli_query($conn, "UPDATE `member` SET `member_password`='$m_newpassword'
WHERE member_id = '" . $_SESSION['id'] . "'") or die('query failed');
            $_SESSION['success'] = 'เปลี่ยนรหัสผ่านเรียบร้อย';
          } else {
            $_SESSION['error'] = 'เกิดข้อผิดพลาดในการเปลี่ยนรหัสผ่าน';
          }
        } else {
          $_SESSION['error'] = 'เกิดข้อผิดพลาดในการเปลี่ยนรหัสผ่าน';
        }
      } //changeCode
      ?>
      <div class="bg-white rounded-md  flex  justify-center">


        <div>
          <p class="mt-8 mb-8 text-black font-bold text-3xl flex  justify-center">เปลี่ยนรหัสผ่าน</p>
          <div class="flex flex-col ">


            <div class=" ">
              <label for="name-e2a4" class="mt-8">รหัสผ่านใหม่</label>
              <input type="password" id="name-e2a4" name="newpassword" class="flex  justify-center border-4 rounded-md border-slate-200" required="">
            </div>
            <div class="mt-8">
              <label for="email-e2a4" class="mt-8">รหัสผ่านใหม่อีกครั้ง</label>
              <input type="password" id="email-e2a4" name="newpassword1" class="flex  justify-center border-4 rounded-md border-slate-200" required="">
            </div>
            <div class="mt-8">
              <label for="text-865f" class="mt-8">รหัสผ่านเก่า</label>
              <input type="password" placeholder="" id="text-865f" name="oldpassword" class="flex  justify-center border-4 rounded-md border-slate-200">
            </div>
            <div class="flex justify-center mt-6">
              <button type="submit" name="changpassword" value="edit" class="px-6 py-2 mb-5 mr-4 leading-5 text-white transition-colors duration-200 transform bg-green-500 rounded-md  focus:outline-none focus:bg-gray-600">เปลี่ยนรหัสผ่าน</button>
            </div>


            <div class="flex justify-center" style="color: red;">
              <?php if (isset($_SESSION['error'])) : ?>
                <div class="error">
                  <h4>
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                  </h4>
                </div>
              <?php endif ?>
              <?php if (isset($_SESSION['success'])) : ?>
                <div class="success">
                  <h4 style="color: #7bae6A">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                  </h4>
                </div>
              <?php endif ?>
            </div>


          </div>
        </div>
      </div>

  </div>
  </form>

<?php
  }
}
?>

</div>
</div>
</div>

<script>
  const page1 = document.getElementById("page1"); //page1-4 คือหน้า เอาไปใส่ id เช่น id = "page1" 
  const page2 = document.getElementById("page2");
  const page3 = document.getElementById("page3");
  const page4 = document.getElementById("page4");
  const button1 = document.getElementById("button1"); //button 1-2 คือปุ่ม ใส่ตรง class เช่น class = "button1"
  //const button2 = document.getElementById("button2");
  const button3 = document.getElementById("button3");
  const button4 = document.getElementById("button4");



  // เมื่อคลิกปุ่มที่ 1หรือ 2 ให้เปิด-ปิดหน้า โดยให้ page ไป .active ซึ่งก็คือ display: block; โดยให้ add เฉพาะ page และ ให้ remove ให้ .active ลบ display: block;
  button1.addEventListener("click", function() {
    page1.classList.add("active");
    page2.classList.remove("active");
    page3.classList.remove("active");
    page4.classList.remove("active");
    button1.classList.add('bold');
    //button2.classList.remove('bold');
    button3.classList.remove('bold');
    button4.classList.remove('bold');

  });


  button3.addEventListener("click", function() {
    page1.classList.remove("active");
    page2.classList.remove("active");
    page3.classList.add("active");
    page4.classList.remove("active")
    button3.classList.add('bold');
    // button2.classList.remove('bold');
    button1.classList.remove('bold');
    button4.classList.remove('bold');
  });

  button4.addEventListener("click", function() {
    page1.classList.remove("active");
    page2.classList.remove("active");
    page3.classList.remove("active")
    page4.classList.add("active");
    button4.classList.add('bold');
    //button2.classList.remove('bold');
    button3.classList.remove('bold');
    button1.classList.remove('bold');
  });
</script>

<div class=" mt-10 bg-white "  style="height: 50px;">

</div>

</body>

</html>