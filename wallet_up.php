<?php
        include("server.php");
        session_start();
        
        $username = $_SESSION['username'];
        $cus_id = $_SESSION['cus_id'];
        
  

        if(isset($_POST['upload']))
        {
            $payment_id =  $_POST['upload'];
        if($payment_id!=0)
        {
     
        $name_file =  $_FILES['upload-img']['name'];
        $tmp_name =  $_FILES['upload-img']['tmp_name'];
        $path =  "upload-product/";
        
        move_uploaded_file($tmp_name,$path.$name_file);


            $wallet_price = $_POST['wallet'];
            $sql_payment_type = "SELECT*FROM payment_type Where payment_id = '$payment_id' ";
            $qury_payment_type = mysqli_query($conn,$sql_payment_type);
            $qury_sql_payment_type = mysqli_fetch_array($qury_payment_type);
            $bank_number_wallet = $qury_sql_payment_type['bank_number'];
            $bank_name_wallet = $qury_sql_payment_type['bank_name'];
            $payment_type = $qury_sql_payment_type['payment_type'];

            



        $sql_upload = "INSERT INTO  wallet_confrim(cus_id,adwoo_coin_c,wallet_img,payment_type_wallet,bank_number_wallet,bank_name_wallet,admin_confirm)value('$cus_id','$wallet_price','$name_file','$payment_type','$bank_number_wallet','$bank_name_wallet','0')";
        mysqli_query($conn,$sql_upload);

        echo "<script>alert('รอระบบตรวจสอบ');
        window.location.href='wallet.php';
        </script>";
        }
        else{
            echo "<script>alert('กรุณาเลือกธนาคาร');
            window.location.href='wallet.php';
            </script>";
        }


        }
        else if(isset($_POST['withdraw']))
        {
            $payment_type = $_POST['payment_type'];
            $bank_number = $_POST['bank_number'];
            $bank_name = $_POST['bank_name'];

            $adwoo_wallat = "SELECT*FROM adwoo_wallat Where cus_id = '$cus_id' ";
            $qury_adwoo_wallat = mysqli_query($conn,$adwoo_wallat);
            $qury_adwoo_wallat_sql = mysqli_fetch_array($qury_adwoo_wallat);

            $adwoo_coin = $qury_adwoo_wallat_sql['adwoo_coin'];
            
            if($adwoo_coin>0)
            {


            
             $sql_withdraw = "INSERT INTO  withdraw (cus_id,payment_type_withdraw,bank_number_withdraw,bank_name_withdraw,adwoo_coin_withdraw,status_withdraw)value('$cus_id','$payment_type','$bank_number','$bank_name',$adwoo_coin,'0')";
            mysqli_query($conn,$sql_withdraw);



            $qury_adwoo_wallat = "UPDATE adwoo_wallat set adwoo_coin = '0' Where cus_id = '$cus_id' ";
            $sql_adwoo_wallat = mysqli_query($conn,$qury_adwoo_wallat);


            echo "<script>alert('ถอนเงินสำเร็จ');
            window.location.href='index.php';
            </script>";
            }
            else{

                echo "<script>alert('ไม่มียอดเงินคงเหลือ');
                window.location.href='index.php';
                </script>";

            }


        }
        else if(isset($_POST['payment_id']))
        {

            $payment_id = $_POST['payment_id'];
            $_SESSION['payment_id'] = $payment_id;
            echo $_SESSION['payment_id'];
           header("location:wallet.php");




        }


?>