<?php
include('server.php');
// ตรวจสอบว่าเข้าสู่ระบบหรือไม่
session_start();

$sql = mysqli_query($conn, "SELECT * FROM order_his WHERE member_id = '" . $_SESSION['id'] . "'");
$row = mysqli_fetch_array($sql);


?>
<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="style.css" rel="stylesheet">
  <title>หน้าดูออเดอร์สินค้า</title>
</head>


<body>

  <?php include 'header.php'; ?>


<div class=" bg-slate-800 ml-36 mt-10 mb-5 rounded-md flex flex-col shadow-md " style="width: 1200px;height: auto;">
<?php
    $sql = mysqli_query($conn, "SELECT * FROM order_his WHERE member_id = '" . $_SESSION['id'] . "'");
    if (mysqli_num_rows($sql) > 0) {
      while ($row = mysqli_fetch_assoc($sql)) {
    ?>
      <div class=" bg-white mt-10 ml-12  rounded-lg border-2 border-stone-950 mb-5 flex  flex-row" style="width: 1100px;height:  ;">
        <div>
          <img class="hidden md:inline-flex   ml-10 rounded-sm mt-5 justify-center w-60 mb-5 " src="images/<?php echo $row['product_image']; ?>">
        </div>
        <div class="bg-white ml-36 flex flex-col  mt-24">


          <p class=" col-span-4 p-1 text-black">ชื่อสินค้า : <?php echo $row['product_name']; ?></p>
          <p class=" col-span-4 p-1 text-black">ยอดการสั่งซื้อ :<?php echo $row['product_price/piece']; ?> </p>
          <p class=" col-span-4 p-1 text-black">วันที่ได้รับสินค้า : <?php echo $row['order_time']; ?></p>
        </div>
      </div>

  <?php }
  } ?>

</div>

</body>

</html>