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
    <link rel= "stylesheet" href = "css//admin-status.css">
    <title>Admin Edit Product</title>
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

<h2>Status Product</h2>
  
  
<form class="example"  method="post" action="seach_db.php" style="margin:auto;max-width:500px">
  <input type="text" placeholder="Search.." name="admin_seach_product" required>
  <button type="submit"  name = "admin_seach_prod">ค้นหา</button>
</form>
<div class="main">
<table class="content-table">
    <thead>
      <tr>
        <th>รหัสสินค้า</th>
        <th>รูป</th>
        <th>ชื่อสินค้า</th>
        <th>ราคา</th>
        <th>ชื่อแบรนด์</th>
        <th>ชื่อประเภทสินค้า</th>
        <th>ปุ่มใช้งาน</th>
      </tr>
    </thead>
    <tbody>
      <tr>
<?php 

$qury_cart_status = "SELECT *FROM product";
$sql_cart = mysqli_query($conn,$qury_cart_status);
while($show_sql_cart = mysqli_fetch_array($sql_cart))
{
  $brand_id = $show_sql_cart['brand_id'];
  $prod_ty_id = $show_sql_cart['prod_ty_id'];

  
  $qury_brand = "SELECT *FROM brands Where brand_id = '$brand_id' ";
  $sql_brand = mysqli_query($conn,$qury_brand);
  $show_sql_brand = mysqli_fetch_array($sql_brand);
  $name_brand = $show_sql_brand['name_brand'];


  $qury_prod_ty = "SELECT *FROM product_type Where prod_ty_id = '$prod_ty_id' ";
  $sql_prod_ty = mysqli_query($conn,$qury_prod_ty);
  $show_prod_ty = mysqli_fetch_array($sql_prod_ty);
  $name_ty_prod = $show_prod_ty['name_ty_prod'];





  




?>
        <td><?php echo $show_sql_cart['prod_id']; ?></td>
        <td><img src = "upload-product/<?php echo $show_sql_cart['name_prod_img'];?>"></td>
        <td><?php echo $show_sql_cart['name_prod'];?></td>
        <td><?php echo number_format($show_sql_cart['price_prod'], 2);?></td>
        <td><?php echo $name_brand ;?></td>
        <td><?php echo $name_ty_prod;?></td>
        <td>
          
        
        
        
        
        <form  method="post" action="admin_edit_prod.php"><button type="submit" class="button" name = "edit_prod" value = "<?php echo $show_sql_cart['prod_id']; ?>" ><span>แก้ไขสินค้า</span></button></form>
        
        
        <form action="admin_delete_db.php" method="post" ><button type="submit" class="button" name = "delete_prod_id" value = "<?php echo $show_sql_cart['prod_id']; ?>" ><span>ลบสินค้า</span></button></form>
      
      
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