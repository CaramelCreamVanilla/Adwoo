<?php 
    include("server.php");
    if(isset($_POST['update_wallet']))
    {
    $wallet_id_confirm = $_POST['update_wallet'];

    $qury_cart_status = "UPDATE wallet_confrim set 	admin_confirm = '1' Where wallet_id_confirm = '$wallet_id_confirm' ";
    $sql_cart = mysqli_query($conn,$qury_cart_status);

    
    $qury_wallet = "SELECT *FROM wallet_confrim Where wallet_id_confirm = '$wallet_id_confirm' ";
    $sql_wallet = mysqli_query($conn,$qury_wallet);
    $show_sql_wallet = mysqli_fetch_array($sql_wallet);
    
      $cus_id =   $show_sql_wallet['cus_id'];
      $wallet_price =  $show_sql_wallet['adwoo_coin_c'];

      $qury_adwoo_wallet = "SELECT *FROM adwoo_wallat Where cus_id = '$cus_id' ";
      $sql_adwoo_wallet = mysqli_query($conn,$qury_adwoo_wallet);
      $show_adwoo_wallet = mysqli_fetch_array($sql_adwoo_wallet);

      if($cus_id ===$show_adwoo_wallet['cus_id'] )
      {
        $total_wallet = $show_adwoo_wallet['adwoo_coin'];
        $total_wallet = $total_wallet +$wallet_price;
        $update_adwoo_wallet = "UPDATE adwoo_wallat set adwoo_coin = '$total_wallet' Where cus_id = '$cus_id' ";
        $sql_update_adwoo = mysqli_query($conn,$update_adwoo_wallet);
      }
      else{

        $sql_wallet_adwoo = "INSERT INTO  adwoo_wallat(cus_id,adwoo_coin)value('$cus_id','$wallet_price')";
        mysqli_query($conn,$sql_wallet_adwoo);

      }



          echo "<script>alert('ยืนยันสำเร็จ');
            window.location.href='admin_status.php';
             </script>";
    }
    else if(isset($_POST['update_wallet_c']))
    {
    $wallet_id_confirm = $_POST['update_wallet_c'];

    $qury_cart_status = "UPDATE wallet_confrim set 	admin_confirm = '1' Where wallet_id_confirm = '$wallet_id_confirm' ";
    $sql_cart = mysqli_query($conn,$qury_cart_status);

    
    $qury_wallet = "SELECT *FROM wallet_confrim Where wallet_id_confirm = '$wallet_id_confirm' ";
    $sql_wallet = mysqli_query($conn,$qury_wallet);
    $show_sql_wallet = mysqli_fetch_array($sql_wallet);
    
      $cus_id =   $show_sql_wallet['cus_id'];
      $wallet_price =  $show_sql_wallet['adwoo_coin_c'];

      $qury_adwoo_wallet = "SELECT *FROM adwoo_wallat Where cus_id = '$cus_id' ";
      $sql_adwoo_wallet = mysqli_query($conn,$qury_adwoo_wallet);
      $show_adwoo_wallet = mysqli_fetch_array($sql_adwoo_wallet);

      if($cus_id ===$show_adwoo_wallet['cus_id'] )
      {
        $total_wallet = $show_adwoo_wallet['adwoo_coin'];
        $total_wallet = $total_wallet +$wallet_price;
        $update_adwoo_wallet = "UPDATE adwoo_wallat set adwoo_coin = '$total_wallet' Where cus_id = '$cus_id' ";
        $sql_update_adwoo = mysqli_query($conn,$update_adwoo_wallet);
      }
      else{

        $sql_wallet_adwoo = "INSERT INTO  adwoo_wallat(cus_id,adwoo_coin)value('$cus_id','$wallet_price')";
        mysqli_query($conn,$sql_wallet_adwoo);

      }



          echo "<script>alert('ยืนยันสำเร็จ');
            window.location.href='admin_wallet_c.php';
             </script>";
    }
    
    else  if(isset($_POST['error_wallet']))
    {
    $error_wallet = $_POST['error_wallet'];

    $qury_cart_status = "UPDATE wallet_confrim set 	admin_confirm = '2'  Where wallet_id_confirm = '$error_wallet' ";
    $sql_cart = mysqli_query($conn,$qury_cart_status);

    echo "<script>alert('ยืนยันสำเร็จ');
    window.location.href='admin_status.php';
     </script>";
    }

    else if(isset($_POST['update_Withdraw'])){

      $withdraw_id = $_POST['update_Withdraw'];

      $qury_cart_status = "UPDATE withdraw set status_withdraw = '1' Where withdraw_id  = '$withdraw_id' ";
      $sql_cart = mysqli_query($conn,$qury_cart_status);
      
      echo "<script>alert('ยืนยันสำเร็จ');
      window.location.href='admin_withdraw.php';
       </script>";


    }

    else  if(isset($_POST['reject_wallet']))
    {
    $reject_wallet = $_POST['reject_wallet'];

    $qury_cart_status = "UPDATE wallet_confrim set 	admin_confirm = '3'  Where wallet_id_confirm = '$reject_wallet' ";
    $sql_cart = mysqli_query($conn,$qury_cart_status);

    echo "<script>alert('สำเร็จ');
    window.location.href='admin_status.php';
     </script>";
    }





?>