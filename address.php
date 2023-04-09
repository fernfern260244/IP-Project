<?php include('server.php');
session_start();

/*if (isset($_POST['asd'])) {
  $m_address = $_POST['address'];

  $update_query = mysqli_query($conn, "UPDATE `member` SET `member_address2`='$m_address'
  WHERE member_id = '".$_SESSION['id']."'") or die('query failed');
  
}   */
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
}

?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>ที่อยู่</title>
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="ที่อยู่">
  <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/">
  <link rel="stylesheet" href="style.css">
</head>


<body class="">
  <?php include 'header.php'; ?>
  <form method="post" enctype="multipart/form-data">
    <div class=" m-8 rounded-md flex flex-row">
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
      <?php
      //ดึงข้อมูลในตาราง product มาแสดง
      $select = mysqli_query($conn, "SELECT * FROM `member` WHERE member_id = '" . $_SESSION['id'] . "'") or die('query failed');

      //ถ้าจำนวนแถวในตารางproductมากกว่า 0 ก็ให้ดึงแถวในตารางมาแสดง
      if (mysqli_num_rows($select) > 0) {
        ($row = mysqli_fetch_assoc($select)); {

      ?>

          <div class=" bg-white flex  justify-center rounded-r-lg  border-2 border-stone-800 drop-shadow-lg " style="width:1200px; height: auto;">
            <div class="bg-white rounded-md mt-5" style="width:600px; height: auto;">


              <p class="mt-8 mb-8 text-black font-bold text-3xl flex  justify-center">ที่อยู่ของฉัน</p>
              <!--<p class="text-7">
              <span style="font-size: 1.5rem; font-weight: 700;">+</span>เพิ่มที่อยู่
              <div>
              <label>ที่อยู่</label>
              <input type = "text" name="address" value = "" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
              <button type="submit" name ="asd" value="edit"class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-green-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600">เพิ่มที่อยู่</button>
               </div>
            </p>
            <p class="mt-8">ที่อยู่ของฉัน</p>
            <p class="text-9"><?php echo $row['member_address1'] ?></p>
            <p class="-10"><?php echo $row['member_address2'] ?></p>
            -->

              <div>
                <label class=" text-black">ที่อยู่ 1</label>
                <input type="text" name="add1" value="<?php echo $row['member_address1']; ?>" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                <button type="submit" name="address1" value="edit" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-green-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600">แก้ไขที่อยู่</button>
              </div>
              <div>
                <label class=" text-black">ที่อยู่ 2</label>
                <input type="text" name="add2" value="<?php echo $row['member_address2']; ?>" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                <button type="submit" name="address2" value="edit" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-green-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600">แก้ไขที่อยู่</button>
              </div>
              <div>
                <label class=" text-black">ที่อยู่ 3</label>
                <input type="text" name="add3" value="<?php echo $row['member_address3']; ?>" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                <button type="submit" name="address3" value="edit" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-green-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600">แก้ไขที่อยู่</button>
              </div>

            </div>
          </div>
      <?php
        }
      }
      ?>

    </div>









</body>


</html>