<?php
session_start();
include("server.php");

    if(isset($_POST['seach']))
    {
        
 
        $search_name =   $_POST['search_name'];
        $_SESSION['search_name'] = $search_name;
        header("location:seach_product.php");
    }
    if(isset($_POST['admin_seach_product']))
    {
        
 
        $admin_seach_product =   $_POST['admin_seach_product'];
        $_SESSION['admin_seach_product'] = $admin_seach_product;
        header("location:admin_seach_product.php");
    }










?>