<?php       include("server.php"); 
  session_start();
  $cus_id = $_SESSION['cus_id'];
  $_SESSION['payment_id'] = 0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel= "stylesheet" href = "css//admin.css">
    <link rel= "stylesheet" href = "css//upload-admin.css">
    <link rel= "stylesheet" href = "css//upload-admin1.css">
    <link rel= "stylesheet" href = "css//wallet1.css">
    <link rel= "stylesheet" href = "css//checkcart1.css"> 
    <title>เติมเงิน</title>
</head>
<body>
    




<div class="container">
<div class="title">Wallet <a href="wallet_withdraw_p.php">ประวัติการถอน</a><a href="wallet_add.php">ประวัติการเติม</a><a href="wallet_withdraw.php">ถอนเงิน</a><a href="wallet.php">เติมเงิน</a><a href="index.php">หน้าหลัก</a></div> 

    <br>
    <br>
    <br> 
    <div class="container">
    <div class="title">ประวัติการถอน</div>
    <div class="content">
        <div class="small-contriner cart-page">
            <table>
              <tr>
                <th>ธนาคาร</th>
                <th>ชื่อผู้รับ</th>
                <th>เลขบัญชี</th>
                <th>จำนวนเงิน</th>
                <th>วันทำการ</th>
                <th>Status</th>
              </tr>


              <?php 
    $qury_withdraw = "SELECT *FROM withdraw Where cus_id = '$cus_id' ";
    $sql_withdraw = mysqli_query($conn,$qury_withdraw);
    while($show_sql_withdraw = mysqli_fetch_array($sql_withdraw))
    {
        if($show_sql_withdraw['status_withdraw']==0)
        {
            $new_status = "รอแอดมินยืนยัน";
        }
        else if($show_sql_withdraw['status_withdraw']==1)
        {
            $new_status = "สำเร็จ";
        }
        $adwoo_coin_withdraw = $show_sql_withdraw['adwoo_coin_withdraw'];
      ?>

              <tr>
                <td>
                      <p><?php echo $show_sql_withdraw['payment_type_withdraw'];?></p>
                    </div>
                  </div>
                </td>
                <td><p><?php echo $show_sql_withdraw['bank_name_withdraw'];?></p></td>
                <td><p><?php echo $show_sql_withdraw['bank_number_withdraw'];?></p></td>
                <td><?php echo number_format($adwoo_coin_withdraw, 2)," ฿";?> </td>
                <td><p><?php echo $show_sql_withdraw['withdraw_time'];?></p></td>
                <td><?php echo $new_status;?> </td>
              </tr>
              <tr>
                <td>

                <?php } ?>
                           </var>
            </table>


    </div>
  </div>
 </div>
    </div>

</div>




</body>
</html>





