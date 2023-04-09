<?php include('server.php');
session_start();
$sql = mysqli_query($conn,"SELECT * FROM member WHERE member_id = '".$_SESSION['id']."'");
$row = mysqli_fetch_array($sql);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirm payment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'headerAdmin.php'; ?>

    <div class=" ml-3  ">
    <div class="grid grid-cols-2 mx-5 my-3 p-5 bg-slate-800 text-white rounded " >
    <?php 
					$select = mysqli_query($conn, "SELECT * FROM `payment_check`") or die('query failed');
					if (mysqli_num_rows($select) > 0) {
						while ($row = mysqli_fetch_assoc($select)) {
							
				?>
            <div class="flex shadow-lg p-2 ">
                <img class="rounded" src="images/<?php echo $row['pay_image']; ?>" width="85" height="85">
                <p  class="m-2 ml-5 mt-4">
                    รหัสผู้ใช้ : <?php echo $row['check_member_id']; ?>
                    <br> รหัสตรวจสอบการชำระเงิน : <?php echo $row['payment_check_id']; ?>
                </p>

                <div class="bg-amber-300 shadow-lg shadow-amber-200/50 flex-none rounded-full p-2 my-auto  ml-5 justify-items-end " >
                    <a href="paymentinf.php?id=<?php echo $row['payment_check_id']; ?>">
                        ตรวจสอบ
                    </a>
                </div>

            </div>

            <?php 
                        }
                    }
                        
				?>
        </div>
    </div>
</body>
</html>