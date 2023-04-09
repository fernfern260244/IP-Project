<?php
include('server.php');
session_start();

$query1 = "SELECT * FROM member ";
$result1 = mysqli_query($conn, $query1);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM payment_check WHERE payment_check_id = $id";
    $result = mysqli_query($conn, $query);
    $row1 = mysqli_fetch_array($result);
} else {
    // handle error when "id" value is not set
    echo "Error: ID value is not set in the URL parameters.";
}
if (isset($_GET['confirm'])) {
    $confirm_id = $_GET['confirm'];
    $check = "SELECT * FROM payment_check WHERE payment_check_id = $confirm_id";
    $insert_query = "INSERT INTO orderlist (`product_id`, `product_name`, `product_image`, `product_price/piece`, 
    `member_id`, `member_name`, `member_address`, `memshop_id`, `memshop_name`) 
    SELECT `check_product_id`, `check_product_name`, `check_product_image`, `check_product_price/piece`, 
    `check_member_id`, `check_member_name`, `check_member_address1`, `check_memshop_id`, `check_memshop_name` 
    FROM payment_check WHERE check_product_id = '$confirm_id'";
    $result_insert = mysqli_query($conn, $insert_query);

// ดึง category_product จากตาราง product
$check = "SELECT category_product FROM product WHERE product_id IN 
    (SELECT check_product_id FROM payment_check WHERE check_product_id = $confirm_id)";

$result = mysqli_query($conn, $check);
$row = mysqli_fetch_assoc($result);
$category_product = $row['category_product'];

// แทนค่า check_column1 ด้วย category_product และ insert ข้อมูลในตาราง statistic
$insert_query_statistic = "INSERT INTO statistic (`category_name`, `product_price/piece`) 
SELECT '$category_product', `check_product_price/piece`
FROM payment_check WHERE check_product_id = '$confirm_id'";

$result_insert_statistic = mysqli_query($conn, $insert_query_statistic);

    $delete_query = "DELETE FROM payment_check WHERE check_product_id = '$confirm_id'";
    $result_delete = mysqli_query($conn, $delete_query) or die("Error: " . mysqli_error($conn));    
    if ($result_insert) {
        header('location: checkpayment.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    if ($result_delete) {
        header('location: checkpayment.php');
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    } 
}

if (isset($_GET['cancel'])) {
    $confirm_id = $_GET['cancel'];
    $status = 'การชำระเงินผิดพลาด';
    $check = "SELECT * FROM payment_check WHERE payment_check_id = $confirm_id";
    $insert_query = "INSERT INTO alert (`product_name`, `product_price/piece`, `status_payment`, `member_id`, `alert_time` ,`payment_check_id`,`product_image` ) 
SELECT `check_product_name`, `check_product_price/piece`, '$status', `check_member_id` ,`pay_date`,`payment_check_id`,`check_product_image`
FROM payment_check WHERE check_product_id = '$confirm_id'";

    $result_insert = mysqli_query($conn, $insert_query);

    // $delete_query = "DELETE FROM payment_check WHERE check_product_id = '$confirm_id'";
    // $result_delete = mysqli_query($conn, $delete_query) or die("Error: " . mysqli_error($conn));    
    if ($result_insert) {
        header('location: checkpayment.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    // if ($result_delete) {
    //     header('location: checkpayment.php');
    // } else {
    //     echo "Error deleting record: " . mysqli_error($conn);
    // }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Information (รายละเอียดการรายงาน)</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'headerAdmin.php'; ?>
    <div class="container my-10 ">
        <div class="">

            <div class=" ">
                <div class="bg-slate-800  flex flex-row my-5 ml-40 rounded-md text-white" style="width: 1150px;height:auto;">
                    <img src="images/<?php echo $row1['pay_image']; ?>" class="rounded-l-lg" width="250" height="100">
                    <p class="m-2 text-xl font-medium  ml-40 mt-5 " style=" line-height: 50px">
                        รหัสตรวจสอบการเงิน : <?php echo $row1['payment_check_id']; ?><br>
                        ชื่อ-นามสกุลผู้โอน : <?php echo $row1['pay_name']; ?><br>
                        เบอร์โทร : <?php echo $row1['pay_mobile']; ?><br>
                        วันที่โอน : <?php echo $row1['pay_date']; ?><br>
                        ธนาคารที่โอน : <?php echo $row1['pay_bank']; ?><br>
                        จำนวนเงินที่ต้องตรวจสอบ : <?php echo number_format($row1['check_product_price/piece'], 0, '.', ','); ?> บาท
                </div>
            </div>
            </p>
        </div>
    </div>
    </div>
    </div>
    <div class="   flex flex-row  mb-7">
        <a name="confirm" href="?confirm=<?php echo $row1['check_product_id']; ?>" class=" mr-20 ml-96 mb-40 px-2 py-2 leading-5 text-white bg-green-500 rounded-md hover:bg-green-300 focus:outline-none">การชำระเงินถูกต้อง</a>
        <a name="cancel" href="?cancel=<?php echo $row1['check_product_id']; ?>" class="bg-amber-300 shadow-lg shadow-amber-200/50 w-auto rounded-lg p-2 ml-96 " name="delete">การชำระเงินผิดพลาด</a>
        

    </div>


    <?php include 'footer.php'; ?>
</body>

</html>