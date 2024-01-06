<?php 
    include("server.php");

    $cart_id = $_POST['update_status'];

    $qury_cart_status = "UPDATE cart set status_cart = '2' Where cart_id = '$cart_id' ";
    $sql_cart = mysqli_query($conn,$qury_cart_status);



            echo "<script>alert('ยืนยันสำเร็จ');
            window.location.href='admin_status_d.php';
             </script>";






?>