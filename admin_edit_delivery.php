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
    <title>Admin Edit Product Type</title>
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

<h2>Status Product Type</h2>

<div class="main">
<table class="content-table">
    <thead>
      <tr>
        <th>ชื่อบริษัทจัดส่ง</th>
        <th>ราคา</th>
        <th>ปุ่มใช้งาน</th>
      </tr>
    </thead>
    <tbody>
      <tr>
<?php 

$qury_cart_status = "SELECT *FROM delivery_type";
$sql_cart = mysqli_query($conn,$qury_cart_status);
while($show_sql_cart = mysqli_fetch_array($sql_cart))
{





?>
        <td><?php echo $show_sql_cart['delivery_type_name']; ?></td>
        <td><?php echo number_format($show_sql_cart['delivery_price'],2);?></td>
        <td>
          
        
        
        
        
        <form  method="post" action="admin_edit_delivery_db.php"><button type="submit" class="button" name = "edit_delivery_type_name" value = "<?php echo $show_sql_cart['delivery_type_name']; ?>" ><span>แก้ไขการขนส่ง</span></button></form>
        
        
        <form action="admin_delete_db.php" method="post" ><button type="submit" class="button" name = "delete_product_type" value = "<?php echo $show_sql_cart['delivery_type_name']; ?>" ><span>ลบการขนส่ง</span></button></form>
      
      
      </td>
      </tr>
      <tr>
<?php 


}?>
      
    </tbody>
  </table>

</div>

</div>
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