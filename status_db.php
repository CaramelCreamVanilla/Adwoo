<?php 
    session_start();
    include('server.php');
    if(isset($_SESSION['cus_id']))
    {
    if(isset($_POST['status_db']))
    {
    $status = $_POST['status_cart'];
    $_SESSION['status'] = $status;
    }
    else{
      $status = 0;
      $_SESSION['status'] = $status;


    }
    header("location:status_s.php");
  }
    else{


      echo "<script>alert('กรุณาเข้าสู่ระบบ');
      window.location.href='index.php';
      </script>";

    }
    ?>