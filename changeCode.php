<?php include('server.php');
session_start();
//ดึงข้อมูลในตาราง product มาแสดง
$select = mysqli_query($conn, "SELECT * FROM `member` WHERE member_id = '" . $_SESSION['id'] . "'") or die('query failed');

//ถ้าจำนวนแถวในตารางproductมากกว่า 0 ก็ให้ดึงแถวในตารางมาแสดง
if (mysqli_num_rows($select) > 0) {
  ($row = mysqli_fetch_assoc($select)); {

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
    }
?>
    <!DOCTYPE html>
    <html style="font-size: 16px;" lang="en">

    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta charset="utf-8">
      <meta name="keywords" content="">
      <meta name="description" content="">
      <title>เปลี่ยนรหัสผ่าน</title>
      <meta name="theme-color" content="#478ac9">
      <meta property="og:title" content="เปลี่ยนรหัสผ่าน">
      <meta property="og:type" content="website">
      <meta data-intl-tel-input-cdn-path="intlTelInput/">
      <link rel="stylesheet" href="style.css">


    </head>

    <body class="">
      <?php include 'header.php'; ?>

      <div class="m-8 rounded-md flex flex-row">
        <div class="bg-slate-800  rounded-l-lg drop-shadow-lg" style="height:auto;width: 300px;">
          <div class="border border-1 shadow-md ml-28 mt-12 rounded-full" style="width: 80px;height: 80px;">
            <img class="" src="images/logo.png">
          </div>
          <div class="  flex flex-col  mt-16 gap-y-6  ml-10 text-center  " style="width: 200px; height: 30px;">
            <div class=" border-2 border-slate-50 rounded-md" style=" height: 50px;">
              <a class=" text-white  " href="record.php">
                <button class="font-bold text-lg ">ประวัติ</button>
              </a>
            </div>
            <div class=" border-2 border-slate-50 rounded-md">
              <a class="text-white  " href="account.php">
                <button class=" ">บัญชีธนาคาร</button>
              </a>
            </div>
            <div class=" border-2 border-slate-50 rounded-md">
              <a class="text-white  " href="address.php">
                <button class=" ">ที่อยู่</button>
              </a>
            </div>
            <div class=" border-2 border-slate-50 rounded-md">
              <a class="text-white  " href="changeCode.php">
                <button class="b ">เปลี่ยนรหัสผ่าน</button>
              </a>
            </div>

          </div>

        </div>

        <div class=" bg-white flex  justify-center rounded-r-lg  border-2 border-stone-800 drop-shadow-lg " style="width:1200px; height: auto;">
          <div class="bg-white rounded-md mt-5" style="width:600px; height: auto;">


            <div>
              <p class="mt-8 mb-8 text-black font-bold text-3xl flex  justify-center">เปลี่ยนรหัสผ่าน</p>
              <div class="flex  justify-center">
                <form method="post" enctype="multipart/form-data">
                  <div class="mt-8">
                    <label for="name-e2a4" class="mt-8">รหัสผ่านใหม่</label>
                    <input type="password" id="name-e2a4" name="newpassword" class="flex  justify-center bg-amber-900" required="">
                  </div>
                  <div class="mt-8">
                    <label for="email-e2a4" class="mt-8">รหัสผ่านใหม่อีกครั้ง</label>
                    <input type="password" id="email-e2a4" name="newpassword1" class="flex  justify-center bg-amber-900" required="">
                  </div>
                  <div class="mt-8">
                    <label for="text-865f" class="mt-8">รหัสผ่านเก่า</label>
                    <input type="password" placeholder="" id="text-865f" name="oldpassword" class="flex  justify-center bg-amber-900">
                  </div>
                  <div class="flex justify-end mt-6">
                    <button type="submit" name="changpassword" value="edit" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-green-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600">เปลี่ยนรหัสผ่าน</button>
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

                </form>
              </div>
            </div>
          </div>
        </div>

      </div>








  <?php
  }
}
  ?>




    </body>

    </html>