<?php   
        include("server.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6280418ae9.js"></script>
    <link rel= "stylesheet" href = "css//admin.css">
    <title>Admin Status</title>
</head>
<body>
    
<div class="sidenav">
        <a href="admin.php">หน้าแรก</a>
        <a href="admin_status.php">เติมเงินเข้าระบบ</a>
        <a href="admin_withdraw.php">ถอนเงินออกระบบ</a>
        <a href="admin_status_d.php">เตรียมของ</a>
<!--side bar add button dropdown  -->
<button class="dropdown-btn">เพิ่ม<i class="fa fa-caret-down"></i></button>
    <div class="dropdown-container">
        <a href="admin_upload.php">เพิ่มสินค้า</a>
        <a href="admin_product_type.php">เพิ่มประเภทสินค้า</a>
        <a href="admin_brands_type.php">เพิ่มแบรนด์</a>
        <a href="admin_add_payment.php">เพิ่มบัญชีธนาคาร</a>
        <a href="admin_add_delivery.php">เพิ่มวิธีจัดส่ง</a>
    </div>
<button class="dropdown-btn">แก้ไข<i class="fa fa-caret-down"></i></button>
    <div class="dropdown-container">
        <a href="admin_delete.php">ข้อมูลสินค้า</a>
        <a href="admin_brand.php">ข้อมูลแบรนด์</a>
        <a href="admin_payment_type.php">บัญชีธนาคาร</a>
        <a href="admin_edit_type.php">ข้อมูลประเภทสินค้า</a>
        <a href="admin_edit_delivery.php">ข้อมูลจัดส่ง</a>
    </div>


        
        <a href="index.php">หน้าสินค้า</a>
        <a href="logout.php">Log out</a></strong></p></div>
      </div>



      <div class="frame">
<h1> Admin </h1>

<h2> Status รอชำระเงินภายหลัง</h2>

<div class="main">
<table class="content-table">
    <thead>
      <tr>
        <th>รหัส Wallet</th>
        <th>รูป</th>
        <th>ชื่อลูกค้า</th>
        <th>จำนวน</th>
        <th>เวลา</th>
        <th>สถานะปัจจุบัน</th>
        <th>ปุ่มใช้งาน</th>
      </tr>
    </thead>
    <tbody>
      <tr>
<?php 

$qury_wallet = "SELECT *FROM wallet_confrim Where admin_confirm = '2' ";
$sql_wallet = mysqli_query($conn,$qury_wallet);
while($show_sql_wallet = mysqli_fetch_array($sql_wallet))
{

        if($show_sql_wallet['admin_confirm']==0)
        {
            $new_status = "รอยืนยัน";
        }
        else{

              $new_status = "รอตรวจสอบ";
        }
  



?>
        <td><?php echo $show_sql_wallet['wallet_id_confirm']; ?></td>
        <td><img   class="zoomD" src = "upload-product/<?php echo $show_sql_wallet['wallet_img'];?>"></td>
        <td><?php echo $show_sql_wallet['cus_id']; ?></td>
        <td><?php echo number_format($show_sql_wallet['adwoo_coin_c'], 2);?></td>
        <td><?php echo $show_sql_wallet['wallet_time'];?></td>
        <td><?php echo "$new_status";   ?></td>
        <td><form action="admin_status_db.php" method="post" ><button type="submit" class="button" name = "update_wallet_c" value = "<?php echo $show_sql_wallet['wallet_id_confirm']; ?>" ><span>ยืนยัน</span></button>
        <form action="admin_status_db.php" method="post" ><button type="submit" class="button" name = "reject_wallet" value = "<?php echo $show_sql_wallet['wallet_id_confirm']; ?>" ><span>ปฏิเสธ</span></button>
      
      </form></td>
      </tr>
      <tr>
<?php 


}?>
      <div id="lightbox"></div>
    </tbody>
  </table>

</div>

</div>
<script>
  window.onload = () => {
    // (A) GET LIGHTBOX & ALL .ZOOMD IMAGES
    let all = document.getElementsByClassName("zoomD"),
        lightbox = document.getElementById("lightbox");
   
    // (B) CLICK TO SHOW IMAGE IN LIGHTBOX
    // * SIMPLY CLONE INTO LIGHTBOX & SHOW
    if (all.length>0) { for (let i of all) {
      i.onclick = () => {
        let clone = i.cloneNode();
        clone.className = "";
        lightbox.innerHTML = "";
        lightbox.appendChild(clone);
        lightbox.className = "show";
      };
    }}
   
    // (C) CLICK TO CLOSE LIGHTBOX
    lightbox.onclick = () => {
      lightbox.className = "";
    };
  };
  
  
  </script>
  <script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>
</body>
</html>