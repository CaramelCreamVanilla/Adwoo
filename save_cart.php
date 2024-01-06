<?php
    session_start();
    include('server.php');
    if(!empty($_SESSION['username']))
    {

    $username = $_SESSION['username'];
    $cus_id = $_SESSION['cus_id'];
    $cus_name = $_SESSION['cus_name'];
    $cus_lastname = $_SESSION['cus_lastname'];
    $cus_address = $_SESSION['cus_address'];
    $cus_tel = $_SESSION['cus_tel'];



    $wallet = $_SESSION['wallet'];



    $sql_qury_round_cart = "SELECT *FROM cart Where cus_id = '$cus_id' ORDER BY cart_round DESC ";
    $sql_round_cart = mysqli_query($conn,$sql_qury_round_cart);
    $sql_cart_row = mysqli_fetch_array($sql_round_cart);
    if(isset($sql_cart_row['cart_round']))
    {
    $cart_round  = $sql_cart_row['cart_round'];
    }

    

    if(empty($cart_round))
    {
        $cart_round = 1;
    }
    else
    {
        $cart_round = $cart_round+1;
    }


    $tototal_cart = 0;



    foreach($_SESSION['cart'] as $prod_id =>$qty_prod_cart)
    {
        $sql_qury_saves = "SELECT *FROM product Where prod_id = '$prod_id' ";

        
        $sql_carts = mysqli_query($conn,$sql_qury_saves);
        $sql_cart_rows = mysqli_fetch_array($sql_carts);
        
        $price_prod_total = $sql_cart_rows['price_prod']*$qty_prod_cart;
        $tototal_cart = $tototal_cart+$price_prod_total;
        
    }



    if($qty_prod_cart!=0)
    {
       $delivery_type =  $_SESSION['delivery_type']; 
       $qury_delivery = "SELECT *FROM delivery_type Where delivery_type_name  = '$delivery_type' ";
       $sql_delivery = mysqli_query($conn,$qury_delivery);
       while($show_sql_sql_delivery = mysqli_fetch_array($sql_delivery))
       {
                $delivery_price = $show_sql_sql_delivery['delivery_price'];
       }
       $tototal_cart = $tototal_cart+ $delivery_price;

    }

    if($wallet>=$tototal_cart)
    {
        $wallet = $wallet-$tototal_cart;
        $update_adwoo_wallet = "UPDATE adwoo_wallat set adwoo_coin = '$wallet' Where cus_id = '$cus_id' ";
        $sql_update_adwoo = mysqli_query($conn,$update_adwoo_wallet);


    $tototal_cart = 0;

    foreach($_SESSION['cart'] as $prod_id =>$qty_prod_cart)
    {
        $sql_qury_save = "SELECT *FROM product Where prod_id = '$prod_id' ";

        
        $sql_cart = mysqli_query($conn,$sql_qury_save);
        $sql_cart_row = mysqli_fetch_array($sql_cart);
        
        $price_prod_total = $sql_cart_row['price_prod']*$qty_prod_cart;
        $tototal_cart = $tototal_cart+$price_prod_total;
        
        if($qty_prod_cart!=0)
        {

        $save_sql_cart = "INSERT iNTO cart(cus_id, prod_id, qty_prod_cart, price_prod_total,cart_round,status_cart)value('$cus_id','$prod_id','$qty_prod_cart','$price_prod_total','$cart_round','1')";

        $save_qury = mysqli_query($conn,$save_sql_cart);
        }
    }



    if($qty_prod_cart!=0)
    {
       $delivery_type =  $_SESSION['delivery_type']; 
       $qury_delivery = "SELECT *FROM delivery_type Where delivery_type_name  = '$delivery_type' ";
       $sql_delivery = mysqli_query($conn,$qury_delivery);
       $show_sql_sql_delivery = mysqli_fetch_array($sql_delivery);
       $delivery_price = $show_sql_sql_delivery['delivery_price'];
       $save_sql_cart_totoal = "INSERT iNTO cart_total(cus_id,cart_round,total,delivery_type_name,delivery_price)value('$cus_id','$cart_round','$tototal_cart','$delivery_type',$delivery_price)";

       $save_qury = mysqli_query($conn,$save_sql_cart_totoal);
       $tototal_cart = $tototal_cart+ $delivery_price;







       $qury_cart_total = "SELECT *FROM cart_total Where cus_id  = '$cus_id' AND cart_round = '$cart_round' ";
       $sql_cart_total = mysqli_query($conn,$qury_cart_total);
       $show_cart_total = mysqli_fetch_array($sql_cart_total);

       $cart_total_id = $show_cart_total['cart_total_id'];


       $save_sql_delivery = "INSERT iNTO delivery(cus_id,cart_total_id,del_address,del_name,del_lastname,del_tel,delivery_type_name,sum_cart_total)value('$cus_id','$cart_total_id','$cus_address','$cus_name','$cus_lastname','$cus_tel','$delivery_type',$tototal_cart)";

       $save_delivery = mysqli_query($conn,$save_sql_delivery);













    }


    
    if(isset($_POST['save_cart']))
    {
        if(isset( $_SESSION['cart_ggs']))
        {
        $_SESSION['cart'] = array();
        unset($_SESSION['cart']);
        echo "<script>alert('สั่งซื้อสำเร็จ');
        window.location.href='index.php';
         </script>";
        }
        if(!isset( $_SESSION['cart_ggs']))
        {
        $_SESSION['cart'] = array();
        unset($_SESSION['cart']);
        echo "<script>alert('สั่งซื้อสำเร็จ');
        window.location.href='cart.php';
         </script>";
        }
    
    
    }

    }
    else if(isset($_SESSION['cart_ggs'])){

       echo "<script>alert('กรุณาเติมเงิน');
        window.location.href='index.php';
         </script>";

    }
    else{

        echo "<script>alert('กรุณาเติมเงิน');
        window.location.href='cart.php';
         </script>";
    }











    }
    else{

        if(isset($_SESSION['cart_ggs']))
        {
        echo "<script>alert('กรุณาเข้าสู่ระบบ');
        window.location.href='index.php';
        </script>";
        }
        else if(!isset($_SESSION['cart_ggs']))
        {
        echo "<script>alert('กรุณาเข้าสู่ระบบ');
        window.location.href='cart.php';
        </script>";
        }


    }




?>