<?php


session_start();
include("server.php");
if(isset($_POST['detail_product']))
{

      $detail_product  =   $_POST['detail_product'];
      $_SESSION['detail_product'] = $detail_product;
      header("location:product_detail.php");


}










?>