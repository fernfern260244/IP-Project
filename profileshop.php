<?php include('server.php');
session_start();
$id = $_GET['ids'];
$sql = mysqli_query($conn, "SELECT * FROM member WHERE member_id = $id");
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



  <div class="p-8  bg-slate-800 shadow mt-24 drop-shadow-xl border-2 border-stone-950 ml-20 rounded-lg" style="width: 1360px;">
    <div class="grid grid-cols-1 md:grid-cols-3">
      <div class="grid grid-rows-2 text-center order-last md:order-first mt-20 md:mt-0">
        <!-- topic -->



      </div>

      <!-- profile -->

      <div class="relative">
        <div class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500">
          <?php
          $select5 = mysqli_query($conn, "SELECT `member_name`,`member_image`, `member_id`, `member_email`, `member_mobile` FROM member WHERE member_id = $id") or die('query failed');
          if (mysqli_num_rows($select5) > 0) {
            $row5 = mysqli_fetch_assoc($select5);
          ?>
            <img src="images/<?php echo $row5['member_image'] ?>" class=" rounded-full border-2 border-l-stone-900 " viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
            </img>
        </div>
        <div class="mt-20 text-center border-b pb-12"><br>
          <h1 class="text-4xl font-medium text-white "><?php echo $row5['member_name'] ?></h1>
          <p class="font-light text-white mt-3"><?php echo $row5['member_email']; ?></p>
          <p class="font-light text-white mt-3"><?php echo $row5['member_mobile']; ?></p>
        </div>
      </div>
    </div>
  </div>

  
  </div>
  </div>
  
  </div>
  <!-- แนะนำสินค้า -->
  


  <?php
              }

  ?>

  </div>

  <h1 class=" text-center  text-3xl mt-10">สินค้าภายในร้าน</h1>
    <div class="block grid grid-cols-3 mt-80">
    <?php
            $select = mysqli_query($conn, "SELECT * FROM `product` WHERE member_id = $id") or die('query failed');
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
  

  
</body>
<?php include 'footer.php'; ?>
</html>