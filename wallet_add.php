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
    <title>ประวัตเติมเงิน</title>
</head>
<body>
    




<div class="container">
<div class="title">Wallet <a href="wallet_withdraw_p.php">ประวัติการถอน</a><a href="wallet_add.php">ประวัติการเติม</a><a href="wallet_withdraw.php">ถอนเงิน</a><a href="wallet.php">เติมเงิน</a><a href="index.php">หน้าหลัก</a></div> 
    <br>
    <br>
    <br> 
    <div class="container">
    <div class="title">ประวัติการเติม</div>
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
    $qury_wallet_confrim = "SELECT *FROM wallet_confrim Where cus_id = '$cus_id' ";
    $sql_wallet_confrim = mysqli_query($conn,$qury_wallet_confrim);
    while($show_sql_wallet_confrim = mysqli_fetch_array($sql_wallet_confrim))
    {
        if($show_sql_wallet_confrim['admin_confirm']==0)
        {
            $new_status = "รอแอดมินยืนยัน";
        }
        else if($show_sql_wallet_confrim['admin_confirm']==1)
        {
            $new_status = "สำเร็จ";
        }
        else if($show_sql_wallet_confrim['admin_confirm']==2)
        {
          $new_status = "รอตรวจสอบ";
        }
        else{

          $new_status = "ปฏิเสธ";

        }
        $adwoo_coin_withdraw = $show_sql_wallet_confrim['adwoo_coin_c'];
      ?>

              <tr>
                <td>
                      <p><?php echo $show_sql_wallet_confrim['payment_type_wallet'];?></p>
                    </div>
                  </div>
                </td>
                <td><p><?php echo $show_sql_wallet_confrim['bank_name_wallet'];?></p></td>
                <td><p><?php echo $show_sql_wallet_confrim['bank_number_wallet'];?></p></td>
                <td><?php echo number_format($adwoo_coin_withdraw, 2)," ฿";?> </td>
                <td><p><?php echo $show_sql_wallet_confrim['wallet_time'];?></p></td>
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





