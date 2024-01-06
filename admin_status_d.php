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

<h2>Status กำลังเตรียมของ</h2>

<div class="main">
<table class="content-table">
    <thead>
      <tr>
        <th>รหัสสินค้า</th>
        <th>รูป</th>
        <th>ชื่อสินค้า</th>
        <th>รหัสลูกค้า</th>
        <th>จำนวน</th>
        <th>ราคา</th>
        <th>ราคารวม</th>
        <th>สถานะปัจจุบัน</th>
        <th>กดเพื่อยืนยัน</th>
      </tr>
    </thead>
    <tbody>
      <tr>
<?php 

$qury_cart_status = "SELECT *FROM cart Where status_cart = '1' ";
$sql_cart = mysqli_query($conn,$qury_cart_status);
while($show_sql_cart = mysqli_fetch_array($sql_cart))
{

    $prod_id =$show_sql_cart['prod_id'];
    $qury_product_status = "SELECT *FROM product Where prod_id = '$prod_id ' ";
    $sql_product = mysqli_query($conn,$qury_product_status);

    while($show_sql_product= mysqli_fetch_array($sql_product))
    {

        if($show_sql_cart['status_cart']==0)
        {
            $new_status = "รอชำระเงิน";
        }
        else if($show_sql_cart['status_cart']==1)
        {
            $new_status = "กำลังเตรียมของ";
        }
        else if($show_sql_cart['status_cart']==2)
        {
            $new_status = "กำลังจัดส่ง";
        }
        else {

          $new_status = "สินค้ามีปัญหา";
        }



?>
        <td><?php echo $show_sql_product['prod_id']; ?></td>
        <td><img src = "upload-product/<?php echo $show_sql_product['name_prod_img'];?>"></td>
        <td><?php echo $show_sql_product['name_prod'];?></td>
        <td><?php echo $show_sql_cart['cus_id'];?></td>
        <td><?php echo $show_sql_cart['qty_prod_cart'];?></td>
        <td><?php echo number_format($show_sql_product['price_prod'], 2);?></td>

        <td><?php echo number_format($show_sql_product['price_prod'], 2);?></td>
        <td><?php echo "$new_status";   ?></td>
        <td><form action="admin_status_db_d.php" method="post" ><button type="submit"  class="button"  name = "update_status" value = "<?php echo $show_sql_cart['cart_id']; ?>" ><span>ยืนยัน</span></button>                     </form></td>
      </tr>
      <tr>
<?php 


}}?>
      
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