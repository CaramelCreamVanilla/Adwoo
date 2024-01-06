<?php 
    session_start();
    include("server.php");


    if(isset($_POST['edit_prod']))
    {

    $prod_id = $_POST['edit_prod'];
    $name_prod = $_POST['name_prod'];
    $price_prod = $_POST['price_prod'];

    $brand_id = $_POST['Brand_id'];
    $prod_ty_id = $_POST['prod_ty_id'];


    $qury_cart_status = "UPDATE product Set name_prod = '$name_prod', price_prod = '$price_prod' , brand_id = '$brand_id',prod_ty_id = '$prod_ty_id' Where prod_id = '$prod_id' ";
    $sql_cart = mysqli_query($conn,$qury_cart_status);



            echo "<script>alert('แก้ไขข้อมูลสำเร็จ');
            window.location.href='admin_delete.php';
             </script>";
    }
   else if(isset($_POST['edit_brand_db']))  
    {

    $brand_id = $_POST['edit_brand_db'];
    $name_brand = $_POST['name_brand'];
    $qury_cart_status = "UPDATE brands Set name_brand = '$name_brand' Where brand_id = '$brand_id' ";
    $sql_cart = mysqli_query($conn,$qury_cart_status);


             echo "<script>alert('แก้ไขข้อมูลสำเร็จ');
             window.location.href='admin_brand.php';
              </script>";
    }
    else if(isset($_POST['edit_prod_ty_id']))  
    {

    $prod_ty_id = $_POST['edit_prod_ty_id'];
    $name_brand = $_POST['name_ty_prod'];

    $qury_cart_status = "UPDATE product_type Set name_ty_prod = '$name_brand' Where prod_ty_id = '$prod_ty_id' ";
    $sql_cart = mysqli_query($conn,$qury_cart_status);



            echo "<script>alert('แก้ไขข้อมูลสำเร็จ');
            window.location.href='admin_edit_type.php';
             </script>";
    }
    else if(isset($_POST['edit_payment_db'])) 
    {


        $payment_id = $_POST['edit_payment_db'];
        $payment_type = $_POST['payment_type'];
        $bank_number = $_POST['bank_number'];
        $bank_name = $_POST['bank_name'];
    
        $qury_cart_status = "UPDATE payment_type Set payment_type = '$payment_type', bank_number = '$bank_number', bank_name = '$bank_name' Where payment_id = '$payment_id' ";
        $sql_cart = mysqli_query($conn,$qury_cart_status);
    
    
    
                echo "<script>alert('แก้ไขข้อมูลสำเร็จ');
                window.location.href='admin_payment_type.php';
                 </script>";



    }
    else if(isset($_POST['edit_delivery_type_name'])) 
    {
        $delivery_type_name = $_POST['delivery_type_name'];
        $delivery_price = $_POST['delivery_price'];
        $edit_delivery_type_name = $_POST['edit_delivery_type_name'];

        $qury_cart_status = "UPDATE delivery_type Set delivery_type_name = '$delivery_type_name', delivery_price = '$delivery_price' Where delivery_type_name = '$edit_delivery_type_name' ";
        
    
        $sql_cart = mysqli_query($conn,$qury_cart_status);
    
    

                echo "<script>alert('แก้ไขข้อมูลสำเร็จ');
                window.location.href='admin_edit_delivery.php';
                 </script>";



    }






?>