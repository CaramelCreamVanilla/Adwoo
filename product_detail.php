
<?php
    session_start();
    include("server.php");
    unset($_SESSION['cart_ggs']);
    unset($_SESSION['delete_cart']);
    unset($_SESSION['delete_cart2']);  


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
    <link rel= "stylesheet" href = "css//product detail.css">
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
<body class='snippet-body'>
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
<div class="container-flui ">
    <div class="row no-gutters">
        <div class="col-md-5 pr-2">
            <div class="card">
                <div class="demo">
                    <ul id="lightSlider">
                        <?php 
                        
                            $detail_product =     $_SESSION['detail_product']; 
                            $sql_product  = "SELECT *FROM product Where prod_id = '$detail_product' ";
                            $qury_product = mysqli_query($conn,$sql_product);
                            
                            $product_sql = mysqli_fetch_array($qury_product);

                            $prod_id = $product_sql['prod_id'];
                            $name_prod = $product_sql['name_prod'];
                            $price_prod = $product_sql['price_prod'];
                            $detail_prod = $product_sql['detail_prod'];
                            $prod_ty_id = $product_sql['prod_ty_id'];
                        
                        ?>

                        <li><img src="upload-product/<?php echo $product_sql['name_prod_img']; ?>"></li>      
                    </ul>
                </div>
            </div>


            <div class="card">
                <br>
                <br>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="d-flex flex-row align-items-center">
                </div>
                <div class="gg">
                <a href="index.php" class="close"></a>
            </div>
                <div class="about"> <span class="font-weight-bold "><?php echo $name_prod;  ?></span>
                    <h4 class="font-weight-bold"><?php echo number_format($price_prod, 2)," ฿";  ?></h4>
                </div>
                <form action="cart_db.php" method="post"  target="iframe_target" >
                <div class="buttons"> <button class="btn btn-outline-warning btn-long cart" name = "buy" value = "<?php echo $prod_id; ?>">Add to Cart</button>  
                </form>
                
                <!-- <button class="btn btn-warning btn-long buy">Buy it Now</button> -->
            </div>



                <hr>
                <div class="product-description">
                    <div><span class="font-weight-bold">Color:</span><span> Standard</span></div>
                    <br>
                    <div class="d-flex flex-row align-items-center"> <i class="fa fa-calendar-check-o"></i> <span class="ml-1">Delivery : 1-3 วัน  </span> </div>
                    <div class="mt-2"> <span class="texth">Description</span><br>
                    <br>
                    <h4>Detail : Product</h4>
                    <h5><?php   echo $detail_prod;  ?></h5>
    
                    
                    <div class="d-flex flex-row align-items-center"> 
                        <div class="d-flex flex-column ml-1 comment-profile">
                            <div class="comment-ratings"> <i class="fa fa-sta"></i> </div><small class="followers">Followers</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- items  -->

            <div class="card mt-3"> 
                
            <span>Similar items: 
            <form action="brand_db.php" method="post" >  
            <button class="btn1 allview " name = "prod_ty_id" value = "<?php echo $prod_ty_id; ?>">All View</button>
            </form>
        
            </span>







            
                <div class="similar-products mt-3 d-flex flex-row">


                <?php  

$qury_img = "SELECT *FROM product Where  prod_ty_id = '$prod_ty_id' order by rand() limit 5";
$sql_img = mysqli_query($conn,$qury_img);
while($show_sql_img = mysqli_fetch_array($sql_img))
{

    $prod_id = $show_sql_img['prod_id'];
    $price_prod_d = $show_sql_img['price_prod'];
    

?>
                    <div class="card border p-1" style="width: 11rem;margin-right: 3px;"> <img src="upload-product/<?php echo $show_sql_img['name_prod_img']; ?>" class="card-img-top" alt="...">
                    
                    <form action="product_detail_db.php" method="post">
                        <button class="imgbtn" name = "detail_product" value = "<?php echo $prod_id; ?>" >ดูสินค้า</button>
                    </form>
                        <div class="card-body">
                            <h6 class="card-title"><?php echo number_format($price_prod_d, 2)," ฿"; ?></h6>
                        </div>
                    </div>
                    

<?php  }?>
                <!-- items  -->








                </div>
            </div>
        </div>
    </div>
</div>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
<script src='https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js'></script>

<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
<script type='text/javascript' src=''></script>
<script type='text/javascript' src=''></script>
<script type='text/Javascript'></script>
</body>
</html>


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