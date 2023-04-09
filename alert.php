<?php include('server.php');
session_start();
$sql = mysqli_query($conn, "SELECT * FROM alert WHERE member_id = '" . $_SESSION['id'] . "'");
$row = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>alert</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="output.css">

</head>

<body>
    <?php include 'header.php'; ?>

    <div class=" bg-slate-800 ml-36 mt-10 mb-5 rounded-md flex flex-col shadow-md " style="width: 1200px;height: auto;">
        <?php
        $sql = mysqli_query($conn, "SELECT * FROM alert WHERE member_id = '" . $_SESSION['id'] . "'");
        if (mysqli_num_rows($sql) > 0) {
            while ($row = mysqli_fetch_assoc($sql)) {

        ?>
                <div class=" bg-white mt-5 ml-12  rounded-lg border-2 border-stone-950 mb-5 flex  flex-row" style="width: 1100px;height:  ;">
                    <div>
                        <img class=" w-56 rounded-md" src="images/<?php echo $row['product_image']; ?>">

                    </div>
                    <div class="bg-white ml-40 flex flex-col mt-16">
                        <h4 class="text-md leading-6 font-medium">ชื่อสินค้า : <?php echo $row['product_name']; ?></h4>
                        <p class="text-sm">ยอดการสั่งซื้อ : <?php echo $row['product_price/piece']; ?></p>
                        <p class="text-sm">เวลาการกดสั่งซื้อ : <?php echo $row['alert_time']; ?></p>
                        <p class="text-sm">การชำระเงินผิดพลาด : <?php echo $row['status_payment']; ?>
                        </p>

                    </div>
                    <div class=" ml-40 mt-20 ">
                        <a name="sent" href="paymentConfirmation1.php?id=<?php echo $row['payment_check_id']; ?>">
                            <button type="button" class=" bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border-2 border-blue-500 hover:border-transparent rounded" style="height: 70px; width:150px;">
                                แนบหลักฐานยืนยันอีกครั้ง
                            </button>
                        </a>
                    </div>

                </div>
        <?php }
        } ?>
    </div>



</body>

</html>