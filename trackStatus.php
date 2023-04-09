<?php
include('server.php');
// ตรวจสอบว่าเข้าสู่ระบบหรือไม่
session_start();

$sql = mysqli_query($conn, "SELECT * FROM orderlist WHERE memshop_id = '" . $_SESSION['id'] . "'");
$row = mysqli_fetch_array($sql);


if (isset($_POST['update_traking'])) {
    $orderlist_id = $_POST['orderlist_id'];
    $update_traking = $_POST['traking'];
    $update_query = mysqli_query($conn, "UPDATE `orderlist` SET `traking_num`='$update_traking' 
    WHERE orderlist_id = '$orderlist_id'") or die('query failed');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>trackStatus</title>
</head>

<body>
    <?php include 'header.php'; ?>


    <div class=" bg-slate-800 ml-36 mt-10 mb-5 rounded-md flex flex-col shadow-md " style="width: 1200px;height: auto;">
        <?php
        $sql = mysqli_query($conn, "SELECT * FROM orderlist WHERE memshop_id = '" . $_SESSION['id'] . "'");
        if (mysqli_num_rows($sql) > 0) {
            while ($row = mysqli_fetch_assoc($sql)) {
        ?>
                <div class=" bg-white mt-10 ml-12  rounded-lg border-2 border-stone-950 mb-5 flex  flex-row" style="width: 1100px;height:  ;">
                    <div>
                        <img class="hidden md:inline-flex   ml-10 rounded-sm mt-5 justify-center w-60 mb-5 " src="images/<?php echo $row['product_image']; ?>">

                    </div>
                    <div class="bg-white ml-36 flex flex-col  mt-16">


                        <p class=" col-span-4 p-1 text-black">ชื่อสินค้า : <?php echo $row['product_name']; ?></p>
                        <p class=" col-span-4 p-1 text-black">ชื่อผู้ซื้อ : <?php echo $row['member_name']; ?></p>
                        <p class=" col-span-4 p-1 text-black">ที่อยู่ผู้ซื้อ : <?php echo $row['member_address']; ?> </p>
                        <p class="col-span-4 p-1 text-black">ราคารายการสั่งซื้อ :<?php echo $row['product_price/piece']; ?> </p>
                        <p class=" col-span-4 p-1 text-black">เลขพัสดุ : <?php echo $row['traking_num']; ?></p>
                        <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="orderlist_id" value="<?php echo $row['orderlist_id']; ?>">
                            <input type="text" name="traking" class="block  px-4 py-2 mt-2 text-black bg-white border border-gray-300 rounded-md dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                            <button type="submit" name="update_traking" value="update_traking" class="px-6 py-2 leading-5 mb-5 mt-5 text-white transition-colors duration-200 transform bg-green-500 rounded-md focus:outline-none focus:bg-gray-600">อัพเดตเลขพัสดุ</button>
                        </form>
                    </div>


                </div>




        <?php }
        } ?>



    </div>
</body>

</html>