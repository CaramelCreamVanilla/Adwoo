<?php       include("server.php");          ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6280418ae9.js"></script>
    <link rel= "stylesheet" href = "css//admin.css">
    <link rel= "stylesheet" href = "css//upload-admin.css">
    <title>Document</title>
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





<div class="container">
    <div class="content">
      <form action="product_type_upload.php" method = "post">
</div>
        <div class="user-details">
          <div class="input-box">

          
          <br>
          <br>
          <div class = "center_status">
           <h2> <span class="details">เพิ่มวิธีจัดส่งสินค้า</span> </h2> 
            <br>
          </div>
            <br>
            <h3> <span class="details">ชื่อบริษัทจัดส่ง</span> </h3> 
            <input type="text" name="delivery_type_name" placeholder="กรุณากรอกชื่อบริษัทจัดส่ง" required>
            <br>
            <br>
            <h3> <span class="details">ราคาจัดส่ง</span> </h3> 
            <input type="number" name="delivery_price" placeholder="กรุณากรอกราคาจัดส่ง"step="0.01" required>
          <br>
          </div>
          <br>
        <button   type="submit" value = "upload" name = "add_delivery"  class="uploadbtn">เพิ่มวิธีการจัดส่งสินค้า</button>
      </form>
    </div>
  </div>

        

</form>
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
