<?php session_start();
        include("server.php");
         unset($_SESSION['cart_ggs']);
         unset($_SESSION['delete_cart']);

         
       $cus_name =   $_SESSION['cus_name'];
       $cus_lastname =    $_SESSION['cus_lastname'];
       $cus_address =     $_SESSION['cus_address'] ;
       $cus_email =  $_SESSION['cus_email'];
       $cus_tel =   $_SESSION['cus_tel'] ;
?>


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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" href = "css//style.css">
    <link rel= "stylesheet" href = "css//login.css">
    <link rel= "stylesheet" href = "css//cart.css">
    <link rel= "stylesheet" href = "css//editprofile.css">
    <link rel="stylesheet" href="bootstrap-4.0.0/bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/6280418ae9.js"></script>
    <title>editprofile</title>
</head>
<header>
<nav id="nev-bar">
		<div class="containerheader">
			<a href="index.php"><img src="img//logo.png" alt="logo" class="logo"></a>
      <form class="p-3"  method="post" action="seach_db.php">
          <div class="col-12 col-md-8 container">
              <input placeholder="ค้นหาสินค้า" name="search_name" id="search-bar" required >
              <button type="submit" name = "seach"class="fas fa-search btn" id="search-btn"></button>
          </div>
      </form>
		
      <?php if (isset($_SESSION['username'])) : ?>
        <div class="containerbutton">

            <button type="button" class="click">
              <span class="button__icon"><i class="fa-solid fa-user"></i></span>
              <span class="button__text1"><?php echo $_SESSION['username']; ?></span>
              </button>

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
    
              <form  method="post" action="status_db.php">
                <button class="links">สถานะตะกร้า</button>
                </form>
                <form  method="post" action="wallet_choice.php">
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
  <div class="gridsidebar">
    <div class="sidenav">
        <p>ยินดีต้อนรับ, <?php echo $_SESSION['username']; ?></p>
        <a href="index.php">หน้าแรก</a>
        <a href="profile.php">บัญชีของฉัน</a>
        <a href="status_db.php">สถานะตะกร้า</a>
        <a href="wallet_choice.php">เติมเงินในกระเป๋า</a>
        <a href="logout.php">ออกจากระบบ</a>
    </div>
    <div class="box">
        <div class="title"><h1><i class="fa-solid fa-user"></i> ข้อมูลส่วนตัว<h1></div>
      <div class="containerprofile">
        <div class="profiledetail">
          <h1>ชื่อ-นามสกุล</h1> <p><?php echo $cus_name," ",$cus_lastname; ?> </p> 
      </div>
      <div class="profiledetail">
          <h1>ที่อยู่</h1> <p><?php echo $cus_address; ?></p>
      </div>
      <div class="profiledetail">
          <h1>เบอร์โทร</h1> <p><?php echo $cus_tel; ?></p>
      </div>
      <div class="profiledetail">
          <h1>อีเมล</h1> <p><?php echo $cus_email; ?></p>
      </div>
      <div class = "edit"><p><a href="editprofile.php">แก้ไข</a> </div>
    </div>
      </div>
  </div>
</body>
</footer>
<footer class="footer">
  <div class="container-footer">
    <div class="row">
      <div class="footer-col">
        <h4>company</h4>
        <ul>
          <li><a href="#">about us</a></li>
          <li><a href="#">our services</a></li>
          <li><a href="#">privacy policy</a></li>
          <li><a href="#">affiliate program</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>get help</h4>
        <ul>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">shipping</a></li>
          <li><a href="#">returns</a></li>
          <li><a href="#">order status</a></li>
          <li><a href="#">payment options</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>online shop</h4>
        <ul>
          <li><a href="#">watch</a></li>
          <li><a href="#">bag</a></li>
          <li><a href="#">shoes</a></li>
          <li><a href="#">dress</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>follow us</h4>
        <div class="social-links">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
    </div>
  </div>
</footer>
</html>





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