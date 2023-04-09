<?php
include('server.php');
// ตรวจสอบว่าเข้าสู่ระบบหรือไม่
session_start();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM product WHERE product_id = $id";
    $result = mysqli_query($conn, $query);
    $row_product = mysqli_fetch_array($result); 
} else {
    // handle error, redirect user, or show error message
}

$sql = mysqli_query($conn,"SELECT * FROM member WHERE member_id = '".$_SESSION['id']."'");
$row = mysqli_fetch_array($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'header.php'; ?>
        
        <?php
            $select1 = mysqli_query($conn, "SELECT member_id  FROM `product` WHERE product_id = $id");
            $row = mysqli_fetch_array($select1);
            $member = $row['member_id'];

            $select = mysqli_query($conn, "SELECT * FROM `member` WHERE member_id = $member" ) or die('query failed');
            if (mysqli_num_rows($select) > 0) {
                $row = mysqli_fetch_assoc($select);
        ?>
       <div class="bg-orange-200 ml-36 mt-10 mb-5 rounded-md flex flex-col shadow-md shadow-inner" style="width: 1200px;height: 820px;">
            <div class="bg-orange-300 mt-10 ml-12 rounded-md" style="width: 1100px;height: 150px;">
                    <span><p class="mt-3 text-2xl ml-3">ที่อยู่ในการจัดส่ง</p></span>
                    <textarea class="resize rounded-md ml-20 w-96 h-24"><?php echo $row['member_address1']; ?></textarea>            
            </div>
        
            <div class="bg-slate-100 mt-2 ml-12 flex flex-col" style="width: 1100px;height: 150px;">

                <div class="bg-amber-600 flex flex-row" style="width: 1100px;height: 50px;">
                    
                    <span><p class="ml-10 mt-2 text-2xl"><?php echo $row['member_name']; ?></p></span>
                </div>

                <div class="bg-orange-300 flex flex-row shadow-lg" style="width: 1100px;height: 100px;">
            <?php
 
                $select = mysqli_query($conn, "SELECT * FROM `product` WHERE product_id = $id" ) or die('query failed');
                if (mysqli_num_rows($select) > 0) {
                    $row = mysqli_fetch_assoc($select);
            ?>
                    <a href=""><img style="width: 90px;" class="mt-1 ml-10 rounded-md" src="images/Celine-Mini-Ava-in-Tromphe-Canvas-and-Calfskin-Tan-Shoulder-Bag.jpg" alt=""></a>
                    <span><p class="mt-8 ml-20 text-3xl"><?php echo $row['product_name']; ?></p></span>
                    <span><p class="mt-8 ml-24 text-3xl"><?php echo $row['product_price/piece']; ?> บาท </p></span>
                    <button class="ml-96 bg-red-600 w-20 h-10 rounded-lg mt-8">ลบสินค้า</button>
                </div>

                


            </div>

            <div class="bg-orange-300 mt-5 ml-12 flex flex-col  shadow-inner" style="width: 1100px;height: 310px;">
                <div class="bg-amber-600 flex flex-row" style="width: 1100px;height: 50px;">
                    <span><p class="ml-20 mt-2 text-2xl">วิธีการชำระเงิน</p></span>
                </div>
                <div class="bg-white rounded-bl-lg flex flex-col" style="width: 300px;height: 500px;">
                        
                        <a href="paymentinf.php">
                        <button class="bg-orange-400 w-36 h-10 ml-20 mt-5 shadow-inner rounded-md">พร้อมเพย์</button>

                    </div>
               
            
            </div>
             <div class="bg-orange-400 mt-16 flex flex-col"style="width: 1200px; height: 90px;" >
                <div class="flex flex-row">
                    <p class="ml-96 text-2xl mt-2">ยอดรวมการสั่งซื้อ <?php echo $row['product_price/piece']; ?>  บาท</p>
                    <button class="bg-orange-300  text-2xl ml-40 w-40 h-10 rounded-md">สั่งสินค้า</button>
                    

                </div>
           
                

            </div>
       </div>
       <?php
                }
            }
 
?>

       <?php include 'footer.php'; ?>
</body>
</html>