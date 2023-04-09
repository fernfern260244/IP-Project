<?php
include('server.php');
session_start();

if (isset($_POST['cancel'])) {
    $spl = "INSERT INTO `basket` ( `product_id`, `product_name`,`member_id`,`product_image`, `product_quantity`, `product_price/piece`,`member_id1`)
                SELECT `product_id`, `product_name`,`member_id`,`product_image`, `product_quantity`, `product_price/piece`, member_id1
                FROM `order` WHERE member_id1 = '" . $_SESSION['id'] . "' ";
    $insert_spl = mysqli_query($conn, $spl);

    if ($insert_spl) {
        mysqli_query($conn, "DELETE FROM `order` WHERE member_id1 = '" . $_SESSION['id'] . "' ");
        header('location: shoppingCart.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['confirm'])) {
    $_SESSION['address'] = $_POST['address'];

    header('location: paymentConfirmation.php');
}
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

    <?php
    $sql = mysqli_query($conn, "SELECT * FROM member WHERE member_id = '" . $_SESSION['id'] . "'");
    $row = mysqli_fetch_array($sql);
    ?>
    <form action="" method="post">
        <div class=" bg-slate-800 ml-36 mt-10 mb-5 rounded-md flex flex-col shadow-md " style="width: 1200px;height: auto;">
            <div class=" bg-white mt-10 ml-12  rounded-lg border-2 border-stone-950" style="width: 1100px;height: 150px;">
                <div class="bg-slate-100 flex flex-col rounded-lg border-2 border-stone-900" style="width: 1100px;height:auto;">
                    <p class="mt-3 text-2xl ml-3">ที่อยู่ในการจัดส่ง</p>
                </div>


                <textarea class="resize ml-5 w-96 h-24 rounded-lg border-2 border-stone-950" name="address"><?php echo $row['member_address1']; ?></textarea>

            </div>

            <div class="bg-slate-100 mt-4 ml-12 flex flex-col rounded-lg border-2 border-stone-900" style="width: 1100px;height:auto;">
                <h2 class="mt-3 text-2xl ml-3">รายการสินค้า</h2>
                <div class=" bg-white flex flex-row shadow-lg rounded-b-lg border-2 border-stone-950" style="width: 1100px;height: auto;">
                    <table>
                        <?php
                        $select_order = mysqli_query($conn, "SELECT * FROM `order` WHERE member_id1 = '" . $_SESSION['id'] . "' ");
                        if (mysqli_num_rows($select_order) > 0) {
                        ?>
                            <thead>
                                <th>รูปภาพ</th>
                                <th>ชื่อสินค้า</th>
                                <th>จำนวน</th>
                                <th>ราคา</th>
                            </thead>
                            <?php
                            while ($row = mysqli_fetch_assoc($select_order)) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img style="width: 60px;" class="mt-1 ml-10 rounded-md" src="images/<?php echo $row['product_image'];  ?>">
                                        </td>
                                        <td>
                                            <p class="mt-4 ml-20 text-2xl"><?php echo $row['product_name']; ?></p>
                                        </td>
                                        <td>
                                            <p class="mt-4 ml-24 text-2xl"><?php echo $row['product_quantity']; ?> ชิ้น</p>
                                        </td>
                                        <td>
                                            <p class="mt-4 ml-24 text-2xl"><?php echo number_format($row['product_price/piece'], 0, '.', ','); ?> บาท/-
                                            <p>
                                        </td>
                                    </tr>
                                </tbody>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>

            <div class="bg-white mt-5 ml-12 flex flex-col  shadow-inner border-2 border-stone-950 rounded-lg" style="width: 1100px;height: 310px;">
                <!-- <div class="bg-white flex flex-row border-2 border-stone-950 rounded-t-lg" style="width: 1100px;height: 50px;"> -->

                <div class="bg-slate-100 flex flex-col rounded-lg border-2 border-stone-900" style="width: 1100px;height:auto;">
                    <p class="ml-20 mt-2 text-2xl">วิธีการชำระเงิน</p>
                </div>
                <!-- </div> -->
                <div class="bg-white rounded-b-lg flex flex-col border-2 border-stone-950" style="width: 300px;height: 500px;">

                    <input type="button" id="submit" class=" bg-amber-500 w-36 h-10 ml-20 mt-5 shadow-inner rounded-md border-2 border-stone-950" value="พร้อมเพย์"></input>
                    <div id="successPopup" class="popup bg-slate-800 text-white rounded-md ">
                        <span class="close">&times;</span>
                        <!-- header QR code -->
                        <div class="flex justify-center my-8 ">
                            <h1 class="text-3xl">การชำระเงิน</h1>
                        </div>
                        <!-- container show picture and name -->
                        <div class="flex justify-center ">
                            <div class="bg-white box-content h-auto w-96 p-4 border-2 rounded-3xl shadow-xl">
                                <!-- รูปภาพ -->
                                <div>
                                    <img src="images/337148061_199198969521669_9082727311375938202_n.jpg" alt="" class="m-5 w-80 h-96 rounded-md">
                                </div>
                                <!-- ชื่อ -->
                                <div class="text-xl justify-items-center my-2 text-black">
                                    <p>ชื่อ : โสภิดา ตั้งการ</p>
                                </div>
                                <!-- เลขบัญชีธนาคาร -->
                                <div class="text-xl justify-items-center my-2 text-black">
                                    <p>เลขบัญชีธนาคาร :11111111111111111</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="myPopup" class="popup bg-slate-800 text-white rounded-md ">
                        <span class="close">&times;</span>
                        
                    </div>
                </div>

                


                <script>
                    var submitButton = document.getElementById("submit");
                    var successPopup = document.getElementById("successPopup");
                    var closeSuccess = successPopup.getElementsByClassName("close")[0];

                    submitButton.onclick = function() {
                        successPopup.style.display = "block";
                    }

                    closeSuccess.onclick = function() {
                        successPopup.style.display = "none";
                    }

                    window.onclick = function(event) {
                        if (event.target == successPopup) {
                            successPopup.style.display = "none";
                        }
                    }

                    var resetButton = document.getElementById("reset");
                    var confirmPopup = document.getElementById("confirmPopup");
                    var closeConfirm = confirmPopup.getElementsByClassName("close")[0];
                    var confirmReset = document.getElementById("confirmReset");
                    var cancelReset = document.getElementById("cancelReset");

                    resetButton.onclick = function() {
                        confirmPopup.style.display = "block";
                    }

                    closeConfirm.onclick = function() {
                        confirmPopup.style.display = "none";
                    }

                    confirmReset.onclick = function() {
                        document.getElementById("name").value = "";
                        document.getElementById("email").value = "";
                        confirmPopup.style.display = "none";
                    }

                    cancelReset.onclick = function() {
                        confirmPopup.style.display = "none";
                    }

                    window.onclick = function(event) {
                        if (event.target == confirmPopup) {
                            confirmPopup.style.display = "none";
                        }
                    }
                </script>
            </div>


            <?php
            $order = mysqli_query($conn, "SELECT * FROM `order` WHERE member_id1 = '" . $_SESSION['id'] . "'");
            $grand_total = 0;
            $quantity_sum = 0;
            if (mysqli_num_rows($order) > 0) {
                while ($fetch_order = mysqli_fetch_assoc($order)) {
                    $product_price = $fetch_order['product_price/piece'];
                    $quantity = $fetch_order['product_quantity'];

                    $quantity_sum += $quantity;
                    $sub_total = $product_price * $quantity;
                    $grand_total += $sub_total;
                }
            }
            ?>
            <div class=" bg-white  mt-5 flex flex-col border-2 border-stone-950 rounded-b-lg" style="width: 1200px;height: 90px;">
                <div class="flex flex-row">
                    <p class="ml-40 text-2xl mt-5">จำนวนทั้งหมด <?php echo $quantity_sum; ?> ชิ้น</p>
                    <p class="ml-10 text-2xl mt-5">ยอดรวมการสั่งซื้อ <?php echo $grand_total ?> บาท</p>
                    <!-- <a name="cancel" href="?cancel"> -->
                    <button class="text-2xl ml-20 w-40 h-10 mt-4 rounded-md" name="cancel" style="background-color: red;">ยกเลิก</button>
                    <!-- </a> -->
                    <!-- <a name="confirm" href="?confirm"> -->
                    <button class="bg-amber-500  text-2xl ml-10 w-40 h-10 mt-4 rounded-md" name="confirm">สั่งสินค้า</button>
                    <!-- </a> -->
                </div>
            </div>
        </div>
    </form>

    <?php include 'footer.php'; ?>

</body>

</html>