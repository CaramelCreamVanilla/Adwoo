<?php



session_start();
if(isset($_POST['brand_id']))
{
$brand_id = $_POST['brand_id'];
$_SESSION['brand_id'] = $brand_id;

header('Location:brands.php');
}

else if(isset($_POST['prod_ty_id']))
{
$prod_ty_id = $_POST['prod_ty_id'];
$_SESSION['prod_ty_id'] = $prod_ty_id;

header('Location:product_type.php');
}



?>