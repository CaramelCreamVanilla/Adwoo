<?php  session_start();
       include('server.php');

       if(isset($_POST['register_db']))
       {
            $regiter_error = 0;
            $username = $_POST['username'];
            $password_1 = $_POST['password_1'];
            $password_2 = $_POST['password_2'];
            $email = $_POST['email'];
            $name = $_POST['name'];
            $lastname = $_POST['lastname'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $sex = $_POST['sex'];
            $cus_level = 'M' ;
            if(empty($username))
            {
                $_SESSION['error_rg'] = "Username is required ";
                $regiter_error = $regiter_error+1;
            }
            if(empty($email))
            {
                $_SESSION['error_rg'] = "Email is required";
                $regiter_error = $regiter_error+1;
            }
            if(empty($password_1))
            {
                $_SESSION['error_rg'] = "Password is required";
                $regiter_error = $regiter_error+1;
            }

            $sql_register_check = " SELECT * FROM customers Where cus_username = '$username' OR cus_email = '$email' ";
            $result_register = mysqli_query($conn,$sql_register_check);

            $row_regiter = mysqli_fetch_array($result_register);
            if($row_regiter)
            {
            if($username === $row_regiter['cus_username'])
            {
                $_SESSION['error_rg'] = "Username error";
                $regiter_error = $regiter_error+1;
            }
            if($email === $row_regiter['cus_email'])
            {
                $_SESSION['error_rg'] =  "duplicate email";
                $regiter_error = $regiter_error+1;
            }
            if($password_1 != $password_2)
            {
                $_SESSION['error_rg'] = "Password_1 & Password 2 not Confrim ";
                $regiter_error = $regiter_error+1;
            }
            }
            
            if($regiter_error == 0)
            {   
                $password = $password_1;
                
                $sql_register = "INSERT INTO customers (cus_username, cus_email, cus_password, cus_name, cus_lastname, cus_address, cus_tel, cus_sex, cus_level)value('$username','$email','$password','$name','$lastname','$address','$phone','$sex','$cus_level')";
                
                mysqli_query($conn,$sql_register);
                echo "<script>alert('สมัครสมาชิกเสร็จสิน');
		        window.location.href='index.php';
	            </script>";
            }
            else{

                header('Location:register.php');
            } 




        }
 ?>