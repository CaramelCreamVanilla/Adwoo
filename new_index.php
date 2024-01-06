<?php session_start();
        include("server.php");
         unset($_SESSION['cart_ggs']);
         unset($_SESSION['delete_cart']);
         unset($_SESSION['delete_cart2']);  
         $_SESSION['payment_id'] = 0;
?>

<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
    <style>.topnav a:hover {
    border-bottom: 3px solid red;
    }</style>
    </head>

    <header>

<!-- Navbar-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    
  <a href="index.php"><img src="img/logo1.png" width="200" height="100"></a>
  <form style="width: 400px; height: 200px; position: absolute; top: 40px; left: 500px;">
  <div class="input-group">
  <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
  <button type="button" class="btn btn-primary">
    <i class="fas fa-search"></i>
  </button>
</div>
  </form>
  <!-- Responsive Button-->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
  </button>
  <!-- Responsive Button-->
    

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto topnav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Shop Pre-Owned</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Shop New Cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Clearence Event</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Resources
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Carfax</a>
                        <a class="dropdown-item" href="#">Carproof</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Omnivic</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary text-white" type="button" onclick="document.getElementById('id01').style.display='block'" data-target="#myModal">Sign In</a>                  
                </li>
                <li class="nav-item">
                    <a href="register.php" class="nav-link btn btn-danger text-white" type="button">Register</a>
                </li>
            </ul>
        </div>

            <!-- The Modal -->
    
            

    </nav>
</div>
<!-- Navbar -->
</header>

<body>

<!-- login -->
<div class="modal" id="id01">
<form  action="login_db.php" method="post">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Customer Sign In</h4>
                    <button type="button" class="close" onclick="document.getElementById('id01').style.display='none'" data-dismiss="modal">×</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" name="username" id="email" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-key"></i></span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-describedby="basic-addon2">
                        </div>
                    
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button name = "login_user" type="submit" class="btn btn-primary" >Sign In</button>
                    <button type="button" class="btn btn-danger close" data-dismiss="modal" onclick="document.getElementById('id01').style.display='none'">Close</button>
                </div>

            </div>
        </div>
    </form>
</div>



<!-- login -->




<!-- ลองดึงจาก DB -->
<h1 style="font-weight: bold font-size: 26px margin-left: 1% position: relative color: #3c3c3c">Brands</h1>
<?php
  $sql_brands = "SELECT *FROM brands";
  $qury_brands = mysqli_query($conn,$sql_brands);  ?>
<?php
  while($brans_sql = mysqli_fetch_array($qury_brands)){
    ?>
    
    <button class="btn btn-outline-secondary" data-mdb-ripple-color="dark" ><img style="width: 5rem" src="product_brand/<?php echo $brans_sql['img_brand']?>"></button>

    <?php
  }?>
<!-- ลองดึงจาก DB -->

      
    </body>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>
       
</html>