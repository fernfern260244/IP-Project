<?php include('server.php');
session_start();
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
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>ประวัติ</title>
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="ประวัติ">
  <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/">
  <link rel="stylesheet" href="style.css">
</head>


<body class="">
  <?php include 'header.php'; ?>

  <body>
    <div class="  m-8 rounded-md flex flex-row">
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
          <?php
          //ดึงข้อมูลในตาราง product มาแสดง
          $select = mysqli_query($conn, "SELECT * FROM `member` WHERE member_id = '" . $_SESSION['id'] . "'") or die('query failed');

          //ถ้าจำนวนแถวในตารางproductมากกว่า 0 ก็ให้ดึงแถวในตารางมาแสดง
          if (mysqli_num_rows($select) > 0) {
            ($row = mysqli_fetch_assoc($select)); {

          ?>


              <div class="">
                <form method="post" enctype="multipart/form-data">
                  <div class="flex flex-col   gap-y-4">

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

                  </div>

              <?php
            }
          }
              ?>
              <div class="flex justify-end mt-6 mb-5">
                <br></br>
                <button type="submit" name="updatemember" value="edit" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-green-500 rounded-md hover:bg-green-200 focus:outline-none focus:bg-gray-600">บันทึกข้อมูล</button>
              </div>

              </div>
        </div>

      </div>
    </div>

    <?php include 'footer.php'; ?>


  </body>

</html>