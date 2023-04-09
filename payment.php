<?php 
include('server.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QRcode</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- header QR code -->
    <div class="flex justify-center my-8">
        <h1 class="text-3xl">การชำระเงิน</h1>
    </div>
    <!-- container show picture and name -->
    <div class="flex justify-center">
        <div class="bg-white box-content h-auto w-96 p-4 border-2 rounded-3xl shadow-xl">
            <!-- รูปภาพ -->
            <div>
                <img src="images/337148061_199198969521669_9082727311375938202_n.jpg" alt="" class="m-5 w-80 h-80 rounded-md">
            </div>
            <!-- ชื่อ -->
            <div class="text-xl justify-items-center my-2">
                <p>ชื่อ : โสภิดา   ตั้งการ</p>
            </div>
            <!-- เลขบัญชีธนาคาร -->
            <div class="text-xl justify-items-center my-2">
                <p>เลขบัญชีธนาคาร :11111111111111111</p>
            </div>
            <!-- ปุ่ม -->
            <div class="flex justify-center my-5">
                <button class="bg-green-500 w-20 h-8 rounded-full text-center">ยืนยัน</button>
            </div>
        </div>
    </div>
</body>
</html>