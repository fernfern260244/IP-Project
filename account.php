<?php include('server.php');
session_start();
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

  <body class="">
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

      <div class=" bg-white flex  justify-center rounded-r-lg  border-2 border-stone-800 drop-shadow-lg " style="width:1200px; height: 500px;">
        <div class="bg-white rounded-md mt-5" style="width:600px; ">


          <p class="font-bold text-3xl flex  justify-center mt-8 mb-8">บัตรเครดิค / บัตรเดบิต</p>
          <div class="flex flex-col justify-center gap-y-4">
            <p class="justify-center">
              <span style="font-size: 1.5rem; font-weight: 700;">+</span>เพิ่ม บัตรเครดิค / บัตรเดบิต
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

    </div>

    <?php include 'footer.php'; ?>

  </body>

</html>