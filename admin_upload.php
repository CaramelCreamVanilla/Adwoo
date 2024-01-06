<?php       include("server.php");          ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" href = "css//admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://kit.fontawesome.com/6280418ae9.js"></script>
    <link rel= "stylesheet" href = "css//upload-admin.css">
    <title>Admin-เพิ่มสินค้า</title>
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
    <div class="title">เพิ่มสินค้า</div>
    <div class="content">
      <form action="upload.php" method = "post" enctype="multipart/form-data">
          <div class="idk">
      <div class="containerimg">
         <div class="wrapper">
            <div class="image">
               <img src="" alt="">
            </div>
            <div class="content">
               <div class="icon">
                  <i class="fas fa-cloud-upload-alt"></i>
               </div>
               <div class="text">
                  ไม่มีไฟล์
               </div>
            </div>
            <div id="cancel-btn">
               <i class="fas fa-times"></i>
            </div>
            <div class="file-name">
               File name here
            </div>
         </div>
      </div>
</div>
        <div class="user-details">
          <div class="input-box">
            <span class="details">Name Product</span>
            <input type="text" name="name_prod" placeholder="กรุณากรอกชื่อสินค้า" required>
          </div>
          <div class="input-box">
            <span class="details">Product Detail</span>
            <input type="text" name="detail_prod" placeholder="กรุณากรอกรายละเอียดสินค้า" required>
          </div>
          <div class="input-box">
            <span class="details">Product Price</span>
            <input type="number" name="price_prod" placeholder="กรุณากรอกราคา"step="0.01" required>
          </div>
          <div class="input-box">
            <span class="details">Brand</span>
            <select id="Brand"name="Brand_id">
    <?php 
    $sql_brans = "SELECT *FROM brands ";
    $qury_brans = mysqli_query($conn,$sql_brans);
    
while($brans_sql = mysqli_fetch_array($qury_brans))
{ 
    ?>
    <option value="<?php echo $brans_sql['brand_id']; ?>"><?php echo $brans_sql['name_brand']; ?></option>
    <?php  
}?>
    </select>
          </div>
          <div class="input-box">
            <span class="details">Product_type</span>
            <select id="product"name="product_type">
        <?php 
    $sql_product_type = "SELECT *FROM product_type ";
    $qury_product_type = mysqli_query($conn,$sql_product_type);
    
while($product_type_sql = mysqli_fetch_array($qury_product_type))
{ 
    
    ?>
    <option value="<?php echo $product_type_sql['prod_ty_id']; ?>"><?php echo $product_type_sql['name_ty_prod']; ?></option>
    <?php  
}?>
    </select>
          </div>
          <div class="input-box">
          <span class="details">Upload</span>
         <input  name ="upload-img" id="default-btn" type="file">
        </div>
        <button   type="submit" value = "upload" name = "upload"  class="uploadbtn">เพิ่มสินค้า</button>
      </form>
    </div>
  </div>


  
<script>
function expand(lbl){
    var elemId = lbl.getAttribute("for");
    document.getElementById(elemId).style.height = "45px";
    document.getElementById(elemId).classList.add("my-style");
    lbl.style.transform = "translateY(-10px)";
}
</script>
<script>
         const wrapper = document.querySelector(".wrapper");
         const fileName = document.querySelector(".file-name");
         const defaultBtn = document.querySelector("#default-btn");
         const customBtn = document.querySelector("#custom-btn");
         const cancelBtn = document.querySelector("#cancel-btn i");
         const img = document.querySelector("img");
         let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
         function defaultBtnActive(){
           defaultBtn.click();
         }
         defaultBtn.addEventListener("change", function(){
           const file = this.files[0];
           if(file){
             const reader = new FileReader();
             reader.onload = function(){
               const result = reader.result;
               img.src = result;
               wrapper.classList.add("active");
             }
             cancelBtn.addEventListener("click", function(){
               img.src = "";
               wrapper.classList.remove("active");
             })
             reader.readAsDataURL(file);
           }
           if(this.value){
             let valueStore = this.value.match(regExp);
             fileName.textContent = valueStore;
           }
         });
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