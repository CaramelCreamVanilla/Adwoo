<?php       include("server.php");
            session_start();    
            if($_SESSION['payment_id'] == 0) 
            {
              $payment_id = 0;
            } 
            else{
              $payment_id = $_SESSION['payment_id'];

            }
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
    <title>เติมเงิน</title>
</head>
<body>
    




<div class="container">
<div class="title">Wallet <a href="wallet_withdraw_p.php">ประวัติการถอน</a><a href="wallet_add.php">ประวัติการเติม</a><a href="wallet_withdraw.php">ถอนเงิน</a><a href="wallet.php">เติมเงิน</a><a href="index.php">หน้าหลัก</a></div> 
    <div class="content">
<br>
<br>
    <form name="payment_type" method="post" action="wallet_up.php" >

    <div class = "center_status">
    <h2>กรุณาเลือกบัญชีธนาคาร</h2>

    
    <br>

<select id="product" name="payment_id" onchange="submitform();" >


<option value="0"><?php 
  $payment_id = $_SESSION['payment_id'];

  $sql_status = "SELECT*FROM payment_type WHERE payment_id = '$payment_id'";
  $qury_status = mysqli_query($conn,$sql_status);
  $status_sql = mysqli_fetch_array($qury_status);

  echo $status_sql['payment_type']

?></option>

<?php 
$sql_status = "SELECT*FROM payment_type";
$qury_status = mysqli_query($conn,$sql_status);

while($status_sql = mysqli_fetch_array($qury_status))
{ 

?>
<option value="<?php echo $status_sql['payment_id']; ?>"><?php echo $status_sql['payment_type']; ?></option>




<?php  



}?>


</select>
</form>
<?php if($payment_id!=0)
{
  
  $sql_payment_type = "SELECT*FROM payment_type Where payment_id = '$payment_id' ";
  $qury_payment_type = mysqli_query($conn,$sql_payment_type);
  $bank_payment_type = mysqli_fetch_array($qury_payment_type);
  
  $payment_id = $bank_payment_type['payment_id'];
  $payment_type = $bank_payment_type['payment_type'];
  $bank_number = $bank_payment_type['bank_number'];
  $bank_name = $bank_payment_type['bank_name'];
  
  
  
  
  ?>

<br>
<br>
<h2>ธนาคาร : <?php echo $payment_type; ?> </h2>
<br>
<h2>เลขบัญชี : <?php echo $bank_number; ?></h2>
<br>
<h2>ชื่อบัญชี : <?php echo $bank_name; ?></h2>
<?php } ?>




</div>
      <form action="wallet_up.php" method = "post" enctype="multipart/form-data">
          <div class="idk">
      <div class="containerimg">
         <div class="wrapper">
            <div class="image">
               <img src="" alt="">
            </div>
            <div class="content">
               <div class="icon">
                  <i class="fas fa-cloud-upload-alt"></i>
               </div>
               <div class="text">
                  ไม่มีไฟล์
               </div>
            </div>
            <div id="cancel-btn">
               <i class="fas fa-times"></i>
            </div>
            <div class="file-name">
               File name here
            </div>
         </div>
      </div>
</div>
        <div class="user-details">
          <div class="input-box">
            <span class="details">เติมเงินในกระเป๋า</span>
            <input type="number" name="wallet" placeholder="กรุณาจำนวนเงิน" step="0.01" required>
          </div>
          <div class="input-box">
          <span class="details">เลือกสลิป</span>
         <input  name ="upload-img" id="default-btn" type="file" required>
        </div>
        <button   type="submit" value = "<?php echo $payment_id; ?>" name = "upload"  class="uploadbtn">เติมเงิน</button>
      </form>
    </div>
  </div>


</body>
</html>





<script>
function expand(lbl){
    var elemId = lbl.getAttribute("for");
    document.getElementById(elemId).style.height = "45px";
    document.getElementById(elemId).classList.add("my-style");
    lbl.style.transform = "translateY(-10px)";
}
</script>
<script>
         const wrapper = document.querySelector(".wrapper");
         const fileName = document.querySelector(".file-name");
         const defaultBtn = document.querySelector("#default-btn");
         const customBtn = document.querySelector("#custom-btn");
         const cancelBtn = document.querySelector("#cancel-btn i");
         const img = document.querySelector("img");
         let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
         function defaultBtnActive(){
           defaultBtn.click();
         }
         defaultBtn.addEventListener("change", function(){
           const file = this.files[0];
           if(file){
             const reader = new FileReader();
             reader.onload = function(){
               const result = reader.result;
               img.src = result;
               wrapper.classList.add("active");
             }
             cancelBtn.addEventListener("click", function(){
               img.src = "";
               wrapper.classList.remove("active");
             })
             reader.readAsDataURL(file);
           }
           if(this.value){
             let valueStore = this.value.match(regExp);
             fileName.textContent = valueStore;
           }
         });
      </script>




<script type="text/javascript">
function submitform()
{
  document.payment_type.submit();
}
</script>
