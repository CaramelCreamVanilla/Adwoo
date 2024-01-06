<?php
        include("server.php");

        if(isset($_POST['upload']))
        {

     
        $name_file =  $_FILES['upload-img']['name'];
        $tmp_name =  $_FILES['upload-img']['tmp_name'];
        $path =  "upload-product/";
        
        move_uploaded_file($tmp_name,$path.$name_file);


        $name_prod = $_POST['name_prod'];
        $detail_prod = $_POST['detail_prod'];
        $price_prod = $_POST['price_prod'];
        $Brand_id = $_POST['Brand_id'];
        $product_type = $_POST['product_type'];
        $sql_upload = "INSERT INTO  product (name_prod_img,name_prod,detail_prod,price_prod,brand_id,prod_ty_id)value('$name_file','$name_prod','$detail_prod','$price_prod','$Brand_id','$product_type')";
        mysqli_query($conn,$sql_upload);


        echo "<script>alert('เพิ่มสินค้าสำเร็จ');
        window.location.href='admin_upload.php';
        </script>";


        }


?>