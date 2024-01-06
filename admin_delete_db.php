<?php 
    include("server.php");

    if(isset($_POST['delete_prod_id']))

    {
    $prod_id =  $_POST['delete_prod_id'];

    $qury_cart_status = "DELETE FROM product WHERE prod_id =  '$prod_id';";
    $sql_cart = mysqli_query($conn,$qury_cart_status);


    if(!$sql_cart)
    {
       
        echo "<script>alert('มีสินค้าอยู่ในระบบไม่สามารถลบได้');
        window.location.href='admin_delete.php';
         </script>";

    }
    else{

            echo "<script>alert('ลบสินค้าสำเร็จ');
            window.location.href='admin_delete.php';
             </script>";
    }
    }


    if(isset($_POST['delete_brand']))

    {
    $brand_id =  $_POST['delete_brand'];

    $qury_cart_status = "DELETE FROM brands WHERE brand_id  =  '$brand_id';";
    $sql_cart = mysqli_query($conn,$qury_cart_status);

    if(!$sql_cart)
    {
       
        echo "<script>alert('มีสินค้าที่มีแบรนด์อยู่');
        window.location.href='admin_brand.php';
         </script>";

    }
        else{

            echo "<script>alert('ลบแบรนด์สำเร็จ');
            window.location.href='admin_brand.php';
             </script>";
        }
    }

    if(isset($_POST['delete_product_type']))

    {
    $delete_product_type =  $_POST['delete_product_type'];

    $qury_cart_status = "DELETE FROM delivery_type WHERE delivery_type_name =  '$delete_product_type'";
    $sql_cart = mysqli_query($conn,$qury_cart_status);

    echo "<script>alert('ลบบัญชีสำเร็จ');
    window.location.href='admin_edit_delivery.php';
     </script>";
    }


    if(isset($_POST['delete_payment']))

    {
    $payment_id =  $_POST['delete_payment'];

    $qury_cart_status = "DELETE FROM payment_type WHERE payment_id  =  '$payment_id';";
    $sql_cart = mysqli_query($conn,$qury_cart_status);



            echo "<script>alert('ลบบัญชีสำเร็จ');
            window.location.href='admin_payment_type.php';
             </script>";
    }



?>