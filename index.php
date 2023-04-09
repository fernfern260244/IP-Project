<?php include('server.php');
session_start();


$sql = "SELECT * FROM member ,product ";
$result = mysqli_query($conn, $sql);

// ดึงข้อมูลแถวเดียวออกมาเป็น associative array
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>2MTrade </title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="output.css">
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
      margin-left: 220px;
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
</head>

<body>
  <!-- <style>
    body {
        background-color: #e09129 !important;
    }
</style> -->


  <header id="header" class=" bg-white bg-opacity-5 shadow-lg rounded " style="background-color: white;z-index: 1;">
    <div class="container m px-2 flex justify-between items-center ">

      <!-- logo -->
      <div class=" md:w-48 flex-shrink-0 pl-3 mr-auto">
        <a href="index.php">
          <img class=" w-20 h-20" src="./images/logo.png" alt="">

        </a>
      </div>
      <form method="get" action="">
        <!-- search -->
        <div class=" mr-20">
          <div class="lg:flex  items-center space-x-2 bg-amber-500 py-1 px-1 rounded-full  ">
            <form action="your-search-action" method="GET" class="w-full">
              <input class="outline-none bg-amber-500 placeholder-orange-900" name="search" type="search" placeholder="ค้นหา" onkeydown="if(event.keyCode==13) { this.form.submit(); return false; }" />
            </form>

          </div>
        </div>
      </form>


      <!-- buttons -->
      <nav class="contents">
        <ul class="ml-4 xl:w-48 flex items-center justify-end">

          
          <!-- alert -->
          <li class="  relative inline-block">
          <?php 
          if (!empty($_SESSION['id'])) {
				$select_rows = mysqli_query($conn, "SELECT * FROM `alert` WHERE member_id = '".$_SESSION['id']."'") or die('query failed');
				$row_count = mysqli_num_rows($select_rows);
          }
			?>
            <a class="" href="alert.php">
              <div class="absolute -top-1 right-0 z-10 bg-yellow-400 text-xs font-bold px-1 py-0.5 rounded-sm"><?php if (!empty($_SESSION['id'])) { echo $row_count; } ?></div>
              <svg class="h-9 lg:h-10 p-2 text-gray-500" aria-hidden="true" focusable="false" data-prefix="far" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
              </svg>
            </a>
          </li>
          <!-- cart -->

          <li class="relative inline-block">
            <?php
            if (!empty($_SESSION['id'])) {
            $select_rows = mysqli_query($conn, "SELECT * FROM `basket` WHERE member_id1 = '" . $_SESSION['id'] . "'") or die('query failed');
            $row_count = mysqli_num_rows($select_rows);
            }
            ?>
            <a class="" href="shoppingCart.php">
              <div class="absolute -top-1 right-0 z-10 bg-yellow-400 text-xs font-bold px-1 py-0.5 rounded-sm"><?php if (!empty($_SESSION['id'])) { echo $row_count;} ?></div>
              <svg class="h-9 lg:h-10 p-2 text-gray-500" aria-hidden="true" focusable="false" data-prefix="far" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z" />
              </svg>
            </a>
          </li>

          <!-- profile -->
          <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>

          <div x-data="{ open: false }" class=" bg-gray-800  dark:bg-white w-64  shadow flex justify-center items-center mr-6 ml-5" style="width: 200px;">
            <div @click="open = !open" class="   border-b-4 border-transparent py-3" :class="{'border-indigo-700 transform transition duration-300 ': open}" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100">
              <div class="flex justify-center items-center space-x-3 cursor-pointer ">
                <div class=" w-7 h-7 rounded-full overflow-hidden border-2 dark:border-white  border-white">
                  <img src="images/<?php if (!empty($_SESSION['id'])) { echo $_SESSION['img'];} ?>" alt="" class="w-full h-full object-cover">
                </div>
                <div class="font-semibold  dark:text-black text-gray-900 text-base">
                  <div class="cursor-pointer"><?php if (!empty($_SESSION['id'])) { echo $_SESSION['username']; } ?></div>
                </div>
              </div>
              <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute w-40 px-5 py-3 dark:bg-amber-400  bg-white rounded-lg shadow border dark:border-transparent mt-5">
                <ul class="space-y-3 dark:text-white">
                  <li class="font-medium">
                    <a href="profileCustomer.php" class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-indigo-700">
                      <div class=" mr-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                      </div>
                      Account
                    </a>
                  </li>
                  <li href="setting.php" class="font-medium">
                    <a href="setting.php" class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-indigo-700">
                      <div class="mr-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                      </div>
                      Setting
                    </a>
                  </li>
                  <hr class="dark:border-gray-700">
                  <li class="font-medium">
                    <a href="logout.php" class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-red-600">
                      <div class="mr-3 text-red-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                      </div>
                      Logout
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>


        </ul>
      </nav>

      <hr>
  </header>

  <script sytle="z-index: 3;" src="header.js"></script>

  <!-- ส่วนเนื้อหา -->
  <div class="grid  grid-flow-col gap-4" sytle="z-index: 1;">
    <div class="row-span-3 gap-4" sytle="z-index: 1;">
      <div class=" ">
        <div class=" bg-slate-800 bg-blur-sm  w-64 justify-center flex-col mt-5 mr-5 ml-5 mb-5 drop-shadow-lg shadow-inner rounded-lg">
          <form action="index.php" method="GET">
            <select name="category" class="select select-success w-40 h-9 mt-8 ml-12 rounded-md" onchange="this.form.submit()">
              <option disabled selected>หมวดหมู่</option>
              <option value="">ทั้งหมด</option>
              <option value="โทรศัพท์">โทรศัพท์</option>
              <option value="บ้านและสวน">บ้านและสวน</option>
              <option value="พระเครื่อง">พระเครื่อง</option>
              <option value="นาฬิกา">นาฬิกา</option>
              <option value="รองเท้า">รองเท้า</option>
              <option value="กล้อง">กล้อง</option>
              <option value="กระเป๋า">กระเป๋า</option>
              <option value="ของใช้ในครัว">ของใช้ในครัว</option>
              <option value="เครื่องใช้ไฟฟ้า">เครื่องใช้ไฟฟ้า</option>
              <option value="หนังสือ">หนังสือ</option>
              <option value="เครื่องสำอาง">เครื่องสำอาง</option>
              <option value="อะไหล่รถ">อะไหล่รถ</option>
              <option value="กีฬา">กีฬา</option>
              <option value="อุปกรณ์สัตว์เลี้ยง">อุปกรณ์สัตว์เลี้ยง</option>
              <option value="อุปกรณ์เครื่องเขียน">อุปกรณ์เครื่องเขียน</option>
              <option value="ของใช้ทารก">ของใช้ทารก</option>
              <option value="เครื่องประดับ">เครื่องประดับ</option>
              <option value="เสื้อผ้า">เสื้อผ้า</option>
            </select>
          </form><br>
          <div class="flex flex-col-reverse  w-40 ml-16 mt-20 ">
            <button class="rounded-md bg-amber-900 hover:bg-amber-800 shadow-inner h-10 w-28 text-white  " onclick="window.location.href='help.php'">ช่วยเหลือ</button>
          </div><br><br>
        </div>
      </div>

      <div class="block grid grid-cols-3">
        <?php
        // ดึงข้อมูลในตาราง product มาแสดง
        $select = mysqli_query($conn, "SELECT * FROM `product`") or die('query failed');

        $category = isset($_GET['category']) ? $_GET['category'] : '';
        $category_where = $category ? "category_product = '$category'" : '';
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $search_where = $search ? "product_name LIKE '%$search%'" : '';
        $where = ($category_where && $search_where) ? "$category_where AND $search_where" : "$category_where$search_where";

        $sql = "SELECT * FROM product" . ($where ? " WHERE $where" : "");
        $result = mysqli_query($conn, $sql);

        // ถ้าจำนวนแถวในตาราง product มากกว่า 0 ก็ให้ดึงแถวในตารางมาแสดง
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>


            <!-- ส่วนของบล็อค -->
            <div class="block1 bg-slate-800 rounded-b-lg rounded-t-lg">
              <div class="block2 bg-slate-800 rounded-lg shadow-inner flex-col">
                <div class="img bg-slate-800 rounded-t-lg">
                  <a href="seeProduct.php?id=<?php echo $row['product_id']; ?>">
                    <img class="img1 rounded-t-lg" src="images/<?php echo $row['product_image']; ?>" alt="">
                  </a>
                </div>
                <div class="bg-slate-800 h-14 rounded-b-lg  " style="height: auto;">
                <div class="rounded-lg" style="width: 299px;">
                <h1 class="text-white ml-2 pt-3 text-center"><?php echo $row['product_name']; ?></h1>
                <?php
                $price = $row['product_price/piece'];
                $formatted_price = number_format($price, 0, '.', ',');
                ?>
  <h1 class="text-white ml-2 pt-3 text-center"><?php echo $formatted_price; ?> บาท</h1>
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

  <?php include 'footer.php'; ?>


</body>

</html>