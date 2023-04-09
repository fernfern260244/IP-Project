<?php include('server.php');
session_start();
$sql = mysqli_query($conn, "SELECT * FROM member WHERE member_id = '" . $_SESSION['id'] . "'");
$row = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="output.css">
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
    height: 350px;
    margin-left: 100px;
    margin-top: 30px;
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

  <div class=" mb-5">
    <div class="p-16">
      <div class="p-8 bg-slate-800 shadow  mt-16 rounded-lg border-2 border-stone-950">
        <div class="grid grid-cols-1 md:grid-cols-3">
          <div class="grid grid-rows-2 text-center order-last md:order-first mt-20 md:mt-0">
            <!-- topic -->
            <div class=" mb-9">
              <p class="font-bold text-white text-xl">ซื้อสินค้า</p>
            </div>
            <!-- manu button -->
            <div class="space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center ">
              
            <?php 
            $select_rows = mysqli_query($conn, "SELECT * FROM `orderlist` WHERE member_id = '".$_SESSION['id']."'") or die('query failed');
            $row_count = mysqli_num_rows($select_rows);
            ?>
              <a href="viewInformation.php"><button class="text-white py-2 px-4 uppercase rounded bg-yellow-500 hover:bg-yellow-300 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                  สถานะสินค้า<div class="absolute -right-1  bg-lime-500 text-xs font-bold px-1 py-0.5 rounded-sm text-black"><?php echo $row_count; ?></div></button>
                

              </a>
              <a href="order_his.php"><button class="text-white py-2 px-4 uppercase rounded bg-yellow-500 hover:bg-yellow-300 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                  ประวัติการสั่งซื้อ</button><a></a>
            </div>

          </div>

          <!-- profile -->
          <div class="relative">
            <div class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500">
              <img src="images/<?php echo $row['member_image']; ?>" class=" rounded-full" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
              </img>
            </div>
          </div>



          <div class=" grid grid-rows-2 space-x-8 text-center  mt-32 md:mt-0 md:justify-center">
            <!-- topic -->
            <div class=" mb-9">
              <p class="font-bold text-white text-xl">ขายสินค้า</p>
            </div>
            <!-- manu button -->
            
            <div class="space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center  ">
              <a href="addproduct.php"><button class="text-white py-2 px-4 uppercase rounded  bg-lime-500 hover:bg-lime-300 shadow hover:shadow-lg font-medium transition  hover:-translate-y-0.5">
                  ลงขายสินค้า</button></a>

                  <?php 
            $select_rows = mysqli_query($conn, "SELECT * FROM `orderlist` WHERE memshop_id = '".$_SESSION['id']."'") or die('query failed');
            $row_count = mysqli_num_rows($select_rows);
            ?>
              <a href="trackStatus.php"><button class="text-white py-2 px-4 uppercase rounded bg-lime-500 hover:bg-lime-300 shadow hover:shadow-lg font-medium transition  hover:-translate-y-0.5">
                  รายการสั่งซื้อสินค้า<div class="absolute -right-1   bg-yellow-400 text-xs font-bold px-1 py-0.5 rounded-sm text-black"><?php echo $row_count; ?></div> </button>
                </a>

                <?php 
            $select_rows = mysqli_query($conn, "SELECT * FROM `product` WHERE member_id = '".$_SESSION['id']."'") or die('query failed');
            $row_count = mysqli_num_rows($select_rows);
            ?>
              <a href="check.php"><button class="text-white py-2 px-4 uppercase rounded bg-lime-500 hover:bg-lime-300 shadow hover:shadow-lg font-medium transition  hover:-translate-y-0.5">
                แก้ไขข้อมูลสินค้า <div class="absolute -right-1     bg-yellow-400 text-xs font-bold px-1 py-0.5 rounded-sm text-black"> <?php echo $row_count; ?></div> </button>
                

              </a>
            </div>

          </div>
        </div>
        <?php
        $select = mysqli_query($conn, "SELECT * FROM `member`WHERE member_id = '" . $_SESSION['id'] . "'") or die('query failed');
        if (mysqli_num_rows($select) > 0) {
          while ($row = mysqli_fetch_assoc($select)) {


        ?>
            <!-- name customer and email -->
            <div class="mt-20 text-center border-b pb-12">
              <h1 class="text-4xl font-medium text-white"><?php echo $_SESSION['username']; ?></h1>
              <p class="font-light text-white mt-3"><?php echo $row['member_email']; ?></p>
              <p class="font-light text-white mt-3"><?php echo $row['member_mobile']; ?></p>
              <p class="font-light text-white mt-3"><?php echo $row['member_address1']; ?></p>
            </div>
      </div>
  <?php
          }
        }

  ?>



  <h1 class=" text-center  text-3xl mt-10">สินค้าภายในร้าน</h1>
  <div class="block grid grid-cols-3 mt-80">
    <?php
    $select = mysqli_query($conn, "SELECT * FROM `product` WHERE member_id = '" . $_SESSION['id'] . "'") or die('query failed');
    if (mysqli_num_rows($select) > 0) {
      while ($row = mysqli_fetch_assoc($select)) { ?>

        <!-- ส่วนของบล็อค -->
        <div class="block1 bg-slate-800 rounded-b-lg rounded-t-lg">
          <div class="block2 bg-slate-800 rounded-lg shadow-inner flex-col">
            <div class="img bg-slate-800 rounded-t-lg">
              <a href="seeProduct.php?id=<?php echo $row['product_id']; ?>">
                <img class="img1 rounded-t-lg" src="images/<?php echo $row['product_image']; ?>" alt="">
              </a>
            </div>
            <div class="flex flex-col overflow-hidden p-sm" data-testid="ad-card-desktop">
              <div class="bg-slate-800 h-14 rounded-b-lg  " style="height: auto;">
                <div class="rounded-lg" style="width: 299px;">
                  <h1 class=" text-white   ml-2 pt-3 text-center"><?php echo $row['product_name']; ?></h1>
                  <h1 class=" text-white  ml-2 pt-3 text-center "><?php echo $row['product_price/piece']; ?> บาท </h1>
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

    </div>
  </div>
  </div>
  </div>
  </div>




  <?php include 'footer.php'; ?>
</body>

</html>