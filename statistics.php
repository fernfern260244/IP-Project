<?php include('server.php');
session_start();
$sql = mysqli_query($conn, "SELECT * FROM member WHERE member_id = '" . $_SESSION['id'] . "'");
$row = mysqli_fetch_array($sql); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="style.css" rel="stylesheet">
  <title>หน้าสถิติ</title>
</head>

<body class="">
  <?php include 'headerAdmin.php'; ?>
  <!-- แสดงสถิติที่เป็นตัวเลข -->
  <div class=" flex justify-center bg-white p-5 rounded-b-lg">
    <div class="flex-auto">
      <label class="text-center">

        <?php
        $select_price = mysqli_query($conn, "SELECT * FROM `statistic`");
        $grand_total = 0;
        $quantity = 1;
        if (mysqli_num_rows($select_price) > 0) {
          while ($fetch_price = mysqli_fetch_assoc($select_price)) {
            $product_price = $fetch_price['product_price/piece'];
            $sub_total = $product_price * $quantity;
            $grand_total += $sub_total;
          }
        }
        ?>
        <div>
          <text class="font-medium">ยอดขาย 12 เดือนย้อนหลัง</text>
        </div>
        <div>
          <text class="text-red-600"><?php echo $grand_total ?> บาท</text>
        </div>
      </label>
    </div>
    <div class="flex-auto">
      <?php 
      $history = "SELECT statistic_id  FROM statistic ORDER BY statistic_id ";
      $query_his = mysqli_query($conn,$history);
      $row_his = mysqli_num_rows($query_his); 
      ?>
      <label class="text-center">
        <div>
          <text class="font-medium">ยอดคำสั่งซื้อ 12 เดือนย้อนหลัง</text>
        </div>
        <div>
          <text class="text-red-600"><?php echo $row_his ?> ครั้ง</text>
        </div>
      </label>
    </div>
    <div class="flex-auto">
      <label class="text-center" >
        <?php 
        $p_query = "SELECT product_id FROM product ORDER BY product_id";
        $query_product = mysqli_query($conn,$p_query);
        $row_product = mysqli_num_rows($query_product);
        ?>
        <div>
          <text class="font-medium">ยอดลงขายสินค้า</text>
        </div>
        <div>
          <text class="text-red-600"><?php echo $row_product?> ครั้ง</text>
        </div>
      </label>
    </div>
    <div class="flex-auto">
      <label class="text-center">
        <?php
        $query = "SELECT member_id FROM member ORDER BY member_id";
        $query_member = mysqli_query($conn, $query);
        $row = mysqli_num_rows($query_member);


        ?>
        <div>
          <text class="font-medium">ยอดคนสมัครสมาชิก</text>
        </div>
        <div>
          <text class="text-red-600"><?php echo $row ?></text>
        </div>
      </label>
    </div>
  </div>

  <div class="flex flex-wrap  bg-slate-800">
    <div class="flex flex-wrap ml-36">
      <!-- กราฟพายแบ่งตามสิ่งที่ซื้อ -->
      <?php
      $sql = "SELECT category_name,COUNT(*) as count FROM statistic GROUP BY category_name";
      $result = mysqli_query($conn, $sql);

      $gender = array();
      $count = array();
      while ($row = mysqli_fetch_assoc($result)) {
        $gender[] = $row['category_name'];
        $count[] = $row['count'];
      }
      ?>

      <div class="w-80 h-96 shadow-lg rounded-lg m-5 ml-36 mr-36 bg-white">
        <canvas class="p-10" id="chartPie1"></canvas>
        <!-- Required chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- Chart pie -->
        <script>
          const dataPie1 = {
            labels: <?php echo json_encode($gender); ?>,
            datasets: [{
              label: "My First Dataset",
              data: <?php echo json_encode($count); ?>,
              backgroundColor: [
                "purple",
                "blue",
                "red",
                "Pink",
                "Orange",
                "Yellow",
                "Green",
                "rgb(27, 255, 0 )",
                "rgb(131, 20, 20)",
                " rgb(102, 193, 7)",
                "rgb(146, 62, 14 )",
                "rgb(245, 183, 177 )",
                "rgb(211, 84, 0)",
                "rgb(183, 149, 11)",
                "rgb(36, 113, 163)",
                "rgb(123, 24, 81)",
                "rgb(64, 224, 208 )",
                "rgb(250, 128, 114)",


              ],
              hoverOffset: 2,
            }, ],
          };


          const configPie1 = {
            type: "pie",
            data: dataPie1,
            options: {
              responsive: true,
              plugins: {
                legend: {
                  position: 'top',
                },
                title: {
                  display: true,
                  text: 'Gender Distribution',
                }
              }
            },
          };

          var chartBar = new Chart(document.getElementById("chartPie1"), configPie1);
        </script>
      </div>
      <!-- กราฟวงกลมแบ่งตามเพศ -->
      <?php
      $sql = "SELECT member_gender,COUNT(*) as count FROM member GROUP BY member_gender";
      $result = mysqli_query($conn, $sql);

      $gender = array();
      $count = array();
      while ($row = mysqli_fetch_assoc($result)) {
        $gender[] = $row['member_gender'];
        $count[] = $row['count'];
      }
      ?>

      <div class="w-80 h-96 shadow-lg rounded-lg m-5  bg-white">
        <canvas class="p-10" id="chartPie2"></canvas>
        <!-- Required chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- Chart pie -->
        <script>
          const dataPie2 = {
            labels: <?php echo json_encode($gender); ?>,
            datasets: [{
              label: "My First Dataset",
              data: <?php echo json_encode($count); ?>,
              backgroundColor: [
                "purple",
                "blue",
                "red",

              ],
              hoverOffset: 2,
            }, ],
          };


          const configPie2 = {
            type: "pie",
            data: dataPie2,
            options: {
              responsive: true,
              plugins: {
                legend: {
                  position: 'top',
                },
                title: {
                  display: true,
                  text: 'Gender Distribution',
                }
              }
            },
          };

          var chartBar = new Chart(document.getElementById("chartPie2"), configPie2);
        </script>
      </div>
    </div>

  </div>



  </div><!-- สถิติที่เป็นกราฟเส้น -->
  <div class="w-1/2 h-full m-5  ml-80">
    <div class=" shadow-lg  rounded-lg overflow-hidden border border-b-4 bg-white">
      <div class=" font-semibold py-3 px-5 bg-gray-50">ยอดขายรวม</div>
      <text class="p-5"> เลือกปี : </text><input type="month" value="" class="border border-b-2 m-5">
      <canvas class="p-10" id="chartLine"></canvas>
    </div>

    <!-- Required chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Chart line -->
    <script>
      const labels = ["January", "February", "March", "April", "May", "June"];
      const data = {
        labels: labels,
        datasets: [{
          label: "ยอดขายรวม",
          backgroundColor: "hsl(252, 82.9%, 67.8%)",
          borderColor: "hsl(252, 82.9%, 67.8%)",
          data: [0, 100, 1000, 3000, 2500, 5000, 4500, 6000, 5000, 10000],
        }, ],
      };
      const configLineChart = {
        type: "line",
        data,
        options: {},
      };
      var chartLine = new Chart(
        document.getElementById("chartLine"),
        configLineChart
      );
    </script>
  </div>
  <?php include 'footer.php'; ?>
</body>

</html>