<?php 
    include('server.php'); 
    session_start(); 

    if(isset($_GET['remove'])) {
        $remove_id = $_GET['remove'];
        mysqli_query($conn, "DELETE FROM `basket` WHERE basket_id = '$remove_id' ");
        header('location: shoppingCart.php');
    }
    if(isset($_POST['home'])) {
        header('location: index.php');
    }
    if(isset($_POST['conf'])) {

        $spl = "INSERT INTO `order` ( `product_id`, `product_name`,`member_id`,`product_image`, `product_quantity`, `product_price/piece`,`member_id1`,`member_name1`)
                SELECT `product_id`, `product_name`,`member_id`,`product_image`, `product_quantity`, `product_price/piece`, member_id1,`member_name1`
                FROM basket WHERE member_id1 = '".$_SESSION['id']."' " ;
        $insert_spl = mysqli_query($conn, $spl);

        if ($insert_spl) {
			mysqli_query($conn, "DELETE FROM `basket` WHERE member_id1 = '".$_SESSION['id']."' ");
			header('location: order.php');
		} else {
			echo "Error: " . mysqli_error($conn);
		}
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="style.css">

    <style>
       
        .delete-btn {
            background-color: red;
            border-radius: 5px;
            font-size: 30px;
        }
        .no_product {
            color: red;
            font-weight: bold;
            text-align: center;
            position: relative;
            top: 30px;
            
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>

<div class="block  bg-white ml-40 mt-10 mb-20 rounded-md flex flex-col  border-2 border-stone-800" style="width: 1100px;height:auto;  ">
    <div class="  flex flex-col" style="width: 1100px;">
        <div class="show-product">
            <form action="" method="post">
                    <div class="bg-gray-700 flex flex-row  mb-8 text-white rounded-t-lg" style="width: 1100px;height: 50px; display: flex; justify-content: center; font-weight: bold; font-size: 30px; ">
                        <h2>รายการสินค้า</h2>
                    </div>
                    <table>
                        <?php 
                            $grand_total = 0;
                            $select_cart = mysqli_query($conn, "SELECT * FROM basket WHERE member_id1 =  '".$_SESSION['id']."' ");
                            if(mysqli_num_rows($select_cart) > 0) {
                        ?>
                        <thead >
                            <th >รูปภาพ</th>
                            <th>ชื่อสินค้า</th>
                            <th>จำนวน</th>
                            <th>ราคา</th>
                            
                        </thead>
                        <?php       
                            while ($row5 = mysqli_fetch_assoc($select_cart)) {
                        ?>
                        <tbody>
                            <tr>
                                <td>
                                    <img style="width: 60px;" class="mt-1 ml-10 rounded-md" src="images/<?php echo $row5['product_image'];  ?>">
                                </td>
                                <td>
                                    <p class="mt-4 ml-20 text-2xl"><?php echo $row5['product_name']; ?></p> 
                                </td>
                                <td>
                                    <p class="mt-4 ml-24 text-2xl"><?php echo $row5['product_quantity']; ?> ชิ้น</p>
                                </td>
                                <td>
                                    <p class="mt-4 ml-24 text-2xl"><?php echo number_format($row5['product_price/piece'], 0, '.', ','); ?> บาท/-<p>
                                </td>
                                <td>
                                    <a href="shoppingCart.php?remove=<?php echo $row5['basket_id']; ?>" class="delete-btn ml-36">ลบ</a>
                                </td>
                            </tr>
                        <?php 
                                }
                            }
                            else {
                                $_SESSION['no_product'] = 'ยังไม่มีสินค้าที่คุณเลือก';
                            }
                            
                            
                        ?>
                        <?php if (isset($_SESSION['no_product'])) : ?>
                            <div class="no_product">
                                <h1>
                                    <?php 
                                        echo $_SESSION['no_product'];
                                        unset($_SESSION['no_product']);                            
                                    ?>
                                </h1>
                            </div>
                        <?php endif ?>
                    </tbody>
                </table>
            </form>
        </div>


    <?php
        $select_cart = mysqli_query($conn, "SELECT * FROM `basket` WHERE member_id1 = '".$_SESSION['id']."'");
        $grand_total = 0;
        if (mysqli_num_rows($select_cart)>0) {
            while($fetch_cart=mysqli_fetch_assoc($select_cart)){
                $product_price = $fetch_cart['product_price/piece'];
                $quantity = $fetch_cart['product_quantity'];
            
                $sub_total = $product_price * $quantity;
                $grand_total += $sub_total;
            }
        }
    ?>
      <form action="" method="post">
        <div class="block2 bg-gray-700 mt-20 rounded-b-lg flex flex-row shadow-inner  " style="width: 1100px; height: 93px;">
            <span><p class="mt-8 ml-20 text-1xl text-white">ทั้งหมด  <?php echo $row_count; ?> ชิ้น</p></span>
            <span><p class="mt-8 ml-80 text-1xl text-white">ยอดทั้งหมด</p></span>
            <span><p class="mt-8 ml-20 text-1xl text-white"><?php echo number_format($grand_total, 0, '.', ','); ?></p></span>
            <?php if(mysqli_num_rows($select_cart) <= 0) : ?>
                <button name="home" class="bg-yellow-400 mt-8 ml-36 text-1xl w-32 h-10 rounded-md">เลือกซื้อสินค้า</button>
            <?php endif ?>
            <?php if(mysqli_num_rows($select_cart) > 0) : ?>
                <button name="conf" class=" bg-yellow-400 mt-8 ml-36 text-1xl w-32 h-10 rounded-md">สั่งซื้อ</button>
            <?php endif ?>
        </div>
      </form>

    </div>
</div>

</body>
</html>