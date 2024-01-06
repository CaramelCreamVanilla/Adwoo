<?php
    session_start();
    include('server.php');
        if(isset($_POST['login_user']));
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            echo $username;
            echo $password;
            $sql = "SELECT * FROM customers WHere cus_username = '$username' AND cus_password = '$password' ";
            $result = mysqli_query($conn,$sql);


            if(mysqli_num_rows($result)==1)
            {
                $row = mysqli_fetch_array($result);
                $_SESSION['cus_id'] = $row["cus_id"];
                $_SESSION['username']= $row["cus_username"];
                $_SESSION['user_level'] = $row["cus_level"];


                $_SESSION['cus_name'] = $row["cus_name"];
                $_SESSION['cus_lastname'] = $row["cus_lastname"];
                $_SESSION['cus_address'] = $row["cus_address"];
                $_SESSION['cus_email'] = $row["cus_email"];
                $_SESSION['cus_tel'] = $row["cus_tel"];

                if($_SESSION['user_level'] == 'M')
                {
                echo "<script>alert('เข้าสู่ระบบสำเร็จ');
		        window.location.href='index.php';
	            </script>";
                }
                if($_SESSION['user_level'] == 'A')
                {
                    echo "<script>alert('เข้าสู่ระบบสำเร็จ');
                    window.location.href='admin.php';
                    </script>";
                }

            }
            else{
               echo "<script>";
                    echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                    echo "window.history.back()";
                echo "</script>";

              }

        }



?>

