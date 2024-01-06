<?php session_start();
        include("server.php");
        unset($_SESSION['cart_ggs']);
        unset($_SESSION['delete_cart']);
        unset($_SESSION['delete_cart2']);
        $search_name = $_SESSION['search_name'];  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" href = "css//style.css">
    <link rel= "stylesheet" href = "css//login.css">
    <link rel= "stylesheet" href = "css//cart.css">
    <link rel="stylesheet" href="bootstrap-4.0.0/bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/6280418ae9.js"></script>
    <title>Adwoo</title>
</head>
<header>
<nav id="nev-bar">
		<div class="containerheader">
    <a href="index.php"><img src="img/logo.png" alt="logo" class="logo"></a>
      <form class="p-3"  method="post" action="seach_db.php">
          <div class="col-12 col-md-8 container">
              <input placeholder="ค้นหาสินค้า" name="search_name" id="search-bar" required >
              <button type="submit" name = "seach"class="fas fa-search btn" id="search-btn"></button>
          </div>
      </form>
		
      <?php if (!isset($_SESSION['username'])) : ?>
    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="button"><span class="button__icon">
			  <i class="fa-solid fa-user"></i>
			</span>
			<span class="button__text">Login</span></button>
        <?php endif ?>
      <?php if (isset($_SESSION['username'])) : ?>
        <div class="containerbutton">

            <button type="button" class="click">
              <span class="button__icon"><i class="fa-solid fa-user"></i></span>
              <span class="button__text"><?php echo $_SESSION['username']; ?></span>
              </button>


              <?php

$cus_id = $_SESSION['cus_id']; 

$sql_wallet = "SELECT * FROM adwoo_wallat WHere cus_id = '$cus_id'";
$qury_wallet = mysqli_query($conn,$sql_wallet);
$row_wallet = mysqli_fetch_array($qury_wallet);


if(mysqli_num_rows($qury_wallet)==1)
{
  $_SESSION['wallet'] = $row_wallet['adwoo_coin'];
  $wallet = $_SESSION['wallet'];
}
else
{
  $wallet = 0;
  $_SESSION['wallet'] = $wallet;

}

?>







              
        <div class="list" style="z-index: 300;">
          

      <?php   if($_SESSION['user_level']=='A')
      {  ?>
        <form method="POST" action="admin.php">
        <button class="links">Admin</button>
        </form>
        <?php } ?>



        <form  method="post" action="profile.php">
          <button class="links">บัญชีของฉัน</button>
          </form>

          <form  method="post" action="status_s.php">
            <button class="links">สถานะตะกร้า</button>
            </form>
            <form  method="post" action="wallet.php">
            <button class="links">ยอดเงินคงเหลือ <?php  echo number_format($wallet,2); ?> บาท</button>
            </form>
            <form  method="post" action="logout.php">
              <button class="links" id="last">ออกจากระบบ</button>
              </form>
         </div>

       </div>
       <?php endif ?>
       <div class="dropdown">

       

      <form  method="post" action="cart.php">
          <button name = "cart_GG" id="id_cart" ><i class="fa fa-shopping-cart"></i></button>
      </form>

      
    <iframe src="cart.php" class="dropdown-content" height="400" width="400" name="iframe_target" >
      </iframe>
      </div>

	</nav>




</header>
           

<body>
<!-- login -->
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="login_db.php" method="post">
    <div class="popup">
    <span onclick="document.getElementById('id01').style.display='none'" class="close-btn" title="Close Modal">&times;</span>
        <div class="form">
            <h2>เข้าสู่ระบบ</h2>
            <div class="form-element">
                <label for="email">รหัสสมาชิก</label>
                <input type="text" name="username" id="email" placeholder="กรุณากรอกรหัสสมาชิก">

            </div>
            <div class="form-element">
                <label for="password">รหัสผ่าน</label>
                <input type="password" name="password" id="password" placeholder="กรุณากรอกรหัสผ่าน">
            </div>
            <div class="form-element">
            <button type="submit" name = "login_user" class="buttons" >เข้าสู่ระบบ</button>
            </div>
            <div class="container signin">
                <p>ไม่มีบัญชีอยู่ <a href="register.php">สมัครสมาชิกที่นี่</a>.</p>
            </div>
            


        </div>

    </div>

  </form>
</div>
<!-- login -->
<!-- button section -->
<senction class="tablesection">
<table  class="centertable">
<br>
        <p class="idk">แบรนด์ทั้งหมด</p>

      <?php 
    $sql_brans = "SELECT *FROM brands ";
    $qury_brans = mysqli_query($conn,$sql_brans);
    
while($brans_sql = mysqli_fetch_array($qury_brans))
{ 
    
    ?>
    <form action="brand_db.php" method="post" >
        <button class="head-button-size blue-bg" ui-sref="start" name = "brand_id" value = "<?php echo $brans_sql['brand_id']; ?>" >
                <div style="text-align:center">
                  <!--i class="fa-solid fa-headphones-simple fa-2x"></i-->
                  <img src="product_brand/<?php echo $brans_sql['img_brand']?>" class= "product_brand" >
                  <br>
                  <span class="head-mini-text"><?php echo $brans_sql['name_brand']; ?></span>
                </div>
              </button>
      </form>
    
        <?php }?>
                </table>
        <table  class="centertable">
        <br>
        <p class="idk">ประเภทสินค้า</p>
        <?php 
    $sql_brans = "SELECT *FROM product_type ";
    $qury_brans = mysqli_query($conn,$sql_brans);
    
while($brans_sql = mysqli_fetch_array($qury_brans))
{ 
    
    ?>
    <form action="brand_db.php" method="post" >
        <button class="head-button-size blue-bg" ui-sref="start" name = "prod_ty_id" value = "<?php echo $brans_sql['prod_ty_id']; ?>" >
                <div style="text-align:center">
                  <!--i class="fa-solid fa-headphones-simple fa-2x"></i-->
                  <img src="product_brand/<?php echo $brans_sql['img_type']?>" class= "product_brand" >
                  <br>
                  <span class="head-mini-text"><?php echo $brans_sql['name_ty_prod']; ?></span>
                </div>
              </button>
      </form>
    
        <?php }?>


    </table>
      </section>
      <!-- button section -->

<!-- card -->
<section class="cardsection">
  <h2 class="all">สินค้าทั้งหมด</h2>
  <a href="index.php" class="ิbackpage">กลับหน้าหลัก</a>
    <div class="grid" >

    <?php  

        $qury_img = "SELECT *FROM product Where name_prod LIKE upper('%$search_name%') ";
        $sql_img = mysqli_query($conn,$qury_img);
        while($show_sql_img = mysqli_fetch_array($sql_img))
        {
      


        ?>

       <div class="contentBox">
       <div class="imgBox">
    				<img src="upload-product/<?php echo $show_sql_img['name_prod_img']?>"  class="picproduct">
        </div>
					<h3 style="color:black"><?php echo $show_sql_img['name_prod']; ?></h3>
          <br>
					<h2 class="price" style="color:black"><?php echo number_format($show_sql_img['price_prod'], 2)," บาท";  ?></h2>
          <form action="product_detail_db.php" method="post">
          <button class="buy2" type="submit" name = "detail_product" value = "<?php echo $show_sql_img['prod_id']; ?>" >รายละะเอียด</button>
          </form>

          <form action="cart_db.php" method="post"  target="iframe_target" >
          <button class="buy" type="submit" name = "buy" value = "<?php echo $show_sql_img['prod_id']; ?>" >หยิบใส่ตะกร้า</button>
         </form>


        </div>
        

        <?php 

      }?>

      </div>
      </div>
    </section>

<!-- card -->


</body>
<footer class="footer">
  <div class="container-footer">
    <div class="row">
      <div class="footer-col">
        <h4>Credit</h4>
        <ul>
          <li>Edit Website: <a href="https://code.visualstudio.com">Visual Studio Code</a></li>
          <li>Edit Picture: <a href="https://www.adobe.com">Adobe Photoshop</a></li>
          <li>My Icon: <a href="https://fontawesome.com">Fontawesome</a></li>
          <li>My Fonts: <a href="https://fonts.google.com">Google Fonts</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Programming Languages</h4>
        <ul>
          <li>JavaScript</li>
          <li>PHP</li>
          <li>SQL</li>
          <li>HTML5</li>
          <li>CSS</li>
          <li>Bootstrap 4</li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>References</h4>
        <ul>
          <li><a href="https://www.advice.co.th">Advice</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>follow us</h4>
        <div class="social-links">
          <a href="https://www.facebook.com/AdviceClub"><i class="fab fa-facebook-f"></i></a>
          <a href="https://youtu.be/bKIZH1eOAHM"><i class="fab fa-youtube"></i></a>
          <a href="https://www.instagram.com/adviceclub/"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
  </div>
</footer></html>




<script>
function openNav($) {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() { 
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
  
}

</script>

<script>
// Get the modal
var modal  =document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<script>

let click = document.querySelector('.click');

let list = document.querySelector('.list');

click.addEventListener("click",()=>{

    list.classList.toggle('newlist');

});

</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>