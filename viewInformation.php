<?php
include('server.php');
// ตรวจสอบว่าเข้าสู่ระบบหรือไม่
session_start();

$sql = mysqli_query($conn, "SELECT * FROM orderlist WHERE member_id = '" . $_SESSION['id'] . "'");
$row = mysqli_fetch_array($sql);

if(isset($_GET['confirm'])){
  $confirm_id = $_GET['confirm'];
  $check = "SELECT * FROM orderlist WHERE orderlist_id=$confirm_id" or die("Error:". mysqli_error($conn));
  $confirm_query = "INSERT INTO order_his (`product_id`, `product_name`, `product_image`, `product_price/piece`, `member_id`, `memshop_id`, `memshop_name`, `order_time`)
  SELECT `product_id`, `product_name`, `product_image`, `product_price/piece`, `member_id`, `memshop_id`, `memshop_name`, NOW()
  FROM orderlist WHERE orderlist_id=$confirm_id";
  

  $result_confirm = mysqli_query($conn,$confirm_query); 

  $deletein_query = "DELETE FROM orderlist WHERE orderlist_id=$confirm_id" or die("Error:". mysqli_connect_error()); 
  $result_delete = mysqli_query($conn,$deletein_query);
}
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="style.css" rel="stylesheet">
  <title>หน้าดูออเดอร์สินค้า</title>
</head>
<style>
  .popup {
    display: none;
    position: fixed;
    z-index: 1;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  }

  .popup p {
    margin: 0;
  }

  .close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    font-weight: bold;
    color: #aaa;
    cursor: pointer;
  }

  .close:hover {
    color: #333;
  }
</style>

<body>

  <?php include 'header.php'; ?>


  <div class=" bg-slate-800 ml-36 mt-10 mb-5 rounded-md flex flex-col shadow-md " style="width: 1200px;height: auto;">
    <?php
    $sql = mysqli_query($conn, "SELECT * FROM orderlist WHERE member_id = '" . $_SESSION['id'] . "'");
    if (mysqli_num_rows($sql) > 0) {
      while ($row = mysqli_fetch_assoc($sql)) {
    ?>
        <div class=" bg-white mt-10 ml-12  rounded-lg border-2 border-stone-950 mb-5 flex  flex-row" style="width: 1100px;height:  ;">
          <div>
            <img class="hidden md:inline-flex   ml-10 rounded-sm mt-5 justify-center w-60 mb-5 " src="images/<?php echo $row['product_image']; ?>">

          </div>
          <div class="bg-white ml-36 flex flex-col  mt-16">
            <p class=" col-span-4 p-1 text-black">ชื่อสินค้า : <?php echo $row['product_name']; ?></p>
            <p class=" col-span-4 p-1 text-black">ที่อยู่ผู้รับ : <?php echo $row['member_address']; ?> </p>
            <p class=" col-span-4 p-1 text-black">ยอดการสั่งซื้อ :<?php echo $row['product_price/piece']; ?> </p>
            <p class="col-span-4 p-1 text-black">เลขพัสดุ : <?php echo $row['traking_num']; ?> </p>
            
            <a name="confirm" href="?confirm=<?php echo $row['orderlist_id']; ?>">
            <button name="confirm" class=" mt-5  bg-lime-500 rounded-md" style="width: 150px; height: 30px; ">ยืนยันการรับสินค้า</button>
      </a> 
          </div>
        </div>
    <?php }
    } ?>
  </div>
</body>
</html>