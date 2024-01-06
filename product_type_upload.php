<?php
        include("server.php");

        if(isset($_POST['product_type']))
        {

     
        $name_file =  $_FILES['upload-img']['name'];
        $tmp_name =  $_FILES['upload-img']['tmp_name'];
        $path =  "product_brand/";
        
        move_uploaded_file($tmp_name,$path.$name_file);


        $name_ty_prod = $_POST['name_ty_prod'];
        $sql_upload = "INSERT INTO  product_type (name_ty_prod,img_type)value('$name_ty_prod','$name_file')";
        mysqli_query($conn,$sql_upload);


        echo "<script>alert('เพิ่มประเภทสินค้าสำเร็จ');
        window.location.href='admin_edit_type.php';
        </script>";


        }

        
        else if(isset($_POST['brands']))
        {

     
        $name_file =  $_FILES['upload-img']['name'];
        $tmp_name =  $_FILES['upload-img']['tmp_name'];
        $path =  "product_brand/";
        
        move_uploaded_file($tmp_name,$path.$name_file);


        $name_brand = $_POST['name_brand'];
        $sql_upload = "INSERT INTO  brands (name_brand,img_brand)value('$name_brand','$name_file')";
        mysqli_query($conn,$sql_upload);


        echo "<script>alert('เพิ่มแบรนด์สำเร็จ');
        window.location.href='admin_brand.php';
        </script>";


        }
                
        else if(isset($_POST['payment_id']))
        {

        $payment_type = $_POST['payment_type'];
        $bank_number = $_POST['bank_number'];
        $bank_name = $_POST['bank_name'];

        $sql_upload = "INSERT INTO  payment_type(payment_type,bank_number,bank_name)value('$payment_type','$bank_number','$bank_name')";
        mysqli_query($conn,$sql_upload);


        echo "<script>alert('เพิ่มบัญชีสำเร็จ');
        window.location.href='admin_payment_type.php';
        </script>";


        }
        else if(isset($_POST['add_delivery']))
        {

        $delivery_type_name = $_POST['delivery_type_name'];
        $delivery_price = $_POST['delivery_price'];

        $sql_upload = "INSERT INTO  delivery_type(delivery_type_name,delivery_price)value('$delivery_type_name','$delivery_price')";
        mysqli_query($conn,$sql_upload);


        echo "<script>alert('เพิ่มวิธีจัดส่งสำเร็จ');
        window.location.href='admin_add_delivery.php';
        </script>";


        }



?>