<?php 
    session_start();
    include("server.php");

   $cus_id = $_SESSION['cus_id'];

    $cus_name = $_POST['cus_name'];
    $cus_lastname = $_POST['cus_lastname'];
    $cus_address = $_POST['cus_address'];
    $cus_tel = $_POST['cus_tel'];
    $cus_email = $_POST['cus_email'];

    $qury_profile = "UPDATE customers Set cus_name = '$cus_name', cus_lastname = '$cus_lastname', cus_address = '$cus_address',cus_tel = '$cus_tel',cus_email = '$cus_email'  Where cus_id = '$cus_id' ";
    $sql_profile = mysqli_query($conn,$qury_profile);


        $sql_profile_new = "SELECT * FROM customers WHere cus_id = '$cus_id' ";
        $qury_profile_new = mysqli_query($conn,$sql_profile_new);

        $row_profile = mysqli_fetch_array($qury_profile_new );
        $_SESSION['username']= $row_profile["cus_username"];
        $_SESSION['user_level'] = $row_profile["cus_level"];


        $_SESSION['cus_name'] = $row_profile["cus_name"];
        $_SESSION['cus_lastname'] = $row_profile["cus_lastname"];
        $_SESSION['cus_address'] = $row_profile["cus_address"];
        $_SESSION['cus_email'] = $row_profile["cus_email"];
        $_SESSION['cus_tel'] = $row_profile["cus_tel"];




            echo "<script>alert('บันทึกข้อมูลสำเร็จ');
            window.location.href='profile.php';
             </script>";






?>