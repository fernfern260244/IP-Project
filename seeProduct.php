<?php include('server.php');
session_start();

$sql = mysqli_query($conn, "SELECT * FROM member WHERE member_id = '" . $_SESSION['id'] . "'");
$row = mysqli_fetch_array($sql);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM product WHERE product_id = $id";
    $result = mysqli_query($conn, $query);
    $row_product = mysqli_fetch_array($result);
} else {
    // handle error, redirect user, or show error message
}

if (isset($_GET['addcart'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $insert_query = "INSERT INTO `basket` ( `product_id`, `product_name`,`member_id`,`product_image`,  `product_price/piece`,`product_quantity`,`member_id1`,`member_name1`)
                        SELECT `product_id`, `product_name`,`member_id`,`product_image`,  `product_price/piece`,`product_quantity`,'" . $_SESSION['id'] . "','" . $_SESSION['username'] . "'
                        FROM product WHERE product_id = $id";
        $insert = mysqli_query($conn, $insert_query);
        // Redirect to shoppingCart.php after adding the item to cart
        header('Location: shoppingCart.php');
        exit();
    } else {
        // handle error, redirect user, or show error message
    }
}
if (isset($_GET['order'])) {
    $insert_query1 = "INSERT INTO `order` ( `product_id`, `product_name`,`member_id`,`product_image`,  `product_price/piece`,  `product_quantity`,`member_id1`,`member_name1`)
                        SELECT `product_id`, `product_name`,`member_id`,`product_image`,  `product_price/piece`,  `product_quantity`,'" . $_SESSION['id'] . "','" . $_SESSION['username'] . "'
                        FROM product WHERE product_id = $id";
    $insert1 = mysqli_query($conn, $insert_query1);
    // Redirect to shoppingCart.php after adding the item to cart
    header('Location: order.php');
    exit();
} else {
    // handle error, redirect user, or show error message
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>information Product</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
</head>

<style>
    .block {
        position: relative;
        width: 990px;
        left: 200px;
        top: -300px;
        z-index: 0;

    }

    .block1 {
        left: float;
        width: 300px;
        height: auto;
        margin-left: 150px;
        margin-top: 100px;
        box-shadow: 10px 15px 10px #333;

    }

    .img {
        width: 300px;
        height: 300px;
        overflow: hidden;
        text-align: center;
    }

    .img1 {
        width: 100%;
        height: 100%;
    }

    .icon1 {
        margin-left: 80px;
    }
</style>

<body>
    <?php include 'header.php'; ?>



    <div class="flex bg-white rounded-lg shadow dark:bg-gray-800 w-5/6 ml-32  mt-10" style="height: 550px;">
        <div class="relative flex-none  ml-20 mt-5 ">
            <img src="images/<?php echo $row_product['product_image']; ?>" style="width: 480px; height:500px;" class="rounded-lg " />
        </div>

        <form class="flex-auto p-6 ml-32 mt-10">
            <div class="flex flex-wrap">
                <h1 class="flex-auto text-xl font-semibold text-gray-500 dark:text-gray-300 ">
                    <span class="font-system text-sd75 text-body-1 text-3xl font-bold" data-testid="ad-detail-title"><?php echo $row_product['product_name']; ?> </span>
                </h1>
                <div class="flex-none w-full mt-2 font-medium text-gray-500 dark:text-gray-300">
                    <?php echo number_format($row_product['product_price/piece'], 0, '.', ','); ?> บาท
                </div>


            </div>
            <div class="flex items-baseline mt-4 mb-6 text-gray-700 dark:text-gray-300">
                <div class="flex space-x-2">
                    <label class="text-center">
                        <div class=" mb-10">
                           
                            <div class=" mt-10">
                                <h2 class=" mt-2   text-body-3 font-bold">รายละเอียดสินค้า</h2>
                                <div class=" ">
                                    <span type="" clss="">
                                        <span class=""> <?php echo $row_product['product_inf.']; ?></span>
                                    </span>
                                </div>
                            </div>

                        </div>
                        <div class=" flex flex-grow">
                            <div>
                                <a href="?order=1&id=<?php echo $id; ?>" type="button" style="height: 30px; width: 130px;" class=" ml-2 bg-yellow-500 rounded-md mr-10 mt-5 text-white ">
                                    ซื้อ
                                </a>
                            </div>
                            <div>
                                <a name="addcart" href="?addcart=1&id=<?php echo $id; ?>" type="button" style="height: 30px; width: 130px;" class=" ml-6 bg-yellow-500 rounded-md mr-10 mt-5 text-white ">
                                    เพิ่มสินค้า
                                </a>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
        </form>
    </div>

    <center>
        <div class=" mt-5 mb-10 pt-5 rounded-md flex flex-row ml-36 ">
            <?php
            //ดึงข้อมูลในตาราง product มาแสดง
            $select1 = mysqli_query($conn, "SELECT member_id FROM `product` WHERE product_id = $id");
            $row = mysqli_fetch_array($select1);
            $member = $row['member_id'];

            $select = mysqli_query($conn, "SELECT `member_name`,`member_image`, `member_id` FROM `member` WHERE member_id = $member") or die('query failed');
            //ถ้าจำนวนแถวในตารางproductมากกว่า 0 ก็ให้ดึงแถวในตารางมาแสดง
            if (mysqli_num_rows($select) > 0) {
                $row = mysqli_fetch_assoc($select); {
            ?>
                    <tr>
                        <a href="profileshop.php?ids=<?php echo $row['member_id']; ?>" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700" style="width: 500px; height: 140px;">
                            <img class="object-cover w-full rounded-md h-96 md:h-auto md:w-48   ml-5" style="width: 105px;" src="images/<?php echo $row['member_image']; ?>" alt="">
                            <div class="flex flex-col justify-between  leading-normal ">
                                <h1 class=" text-gray-100 ml-2" style="color: white;" >ลงขายโดย</h1>
                                <h5 href="profileshop.php?ids=<?php echo $row['member_id']; ?>" class="mb-2 text-2xl  font-bold tracking-tight text-gray-900 dark:text-white ml-5"> <?php echo $row['member_name']; ?></h5>
                            </div>
                        </a>
        </div>
    </center>

    <!-- สินค้าแนะนำ -->

    <h1 class=" text-center  text-3xl">สินค้าแนะนำ</h1>
    <div class="block grid grid-cols-3 mt-64">

        <?php
                    //ดึงข้อมูลในตาราง product มาแสดง
                    $select = mysqli_query($conn, "SELECT * FROM `product`") or die('query failed');
                    //ถ้าจำนวนแถวในตารางproductมากกว่า 0 ก็ให้ดึงแถวในตารางมาแสดง
                    if (mysqli_num_rows($select) > 0) {
                        for ($x = 0; $x <= 5; $x++) {
                            $row1 = mysqli_fetch_assoc($select)
        ?>

                <!-- ส่วนของบล็อค -->
                <div class="block1 bg-slate-800 rounded-b-lg rounded-t-lg">
                    <div class="block2 bg-slate-800 rounded-lg shadow-inner flex-col">
                        <div class="img bg-slate-800 rounded-t-lg">
                            <a href="seeProduct.php?id=<?php echo $row1['product_id']; ?>">
                                <img class="h-full w-full object-cover" loading="lazy" src="images/<?php echo $row1['product_image'] ?>">
                            </a>
                        </div>
                        <div class="flex flex-col overflow-hidden p-sm" data-testid="ad-card-desktop">
                            <div class="bg-slate-800 h-14 rounded-b-lg  " style="height: auto;">
                                <div class="rounded-lg" style="width: 299px;">
                                    <h1 class=" text-white   ml-2 pt-3 text-center"><?php echo $row1['product_name']; ?></h1>
                                    <h1 class=" text-white  ml-2 pt-3 text-center "><?php echo number_format($row1['product_price/piece'], 0, '.', ','); ?> บาท </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
                        }
                    }
        ?>

    </div>


<?php
                }
            }

?>

</body>
<?php include 'footer.php'; ?>



</html>