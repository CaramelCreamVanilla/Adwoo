<?php       include("server.php");
            session_start();
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
    <title>ถอนเงิน</title>
</head>
<body>
    




<div class="container">
<div class="title">Wallet <a href="wallet_withdraw_p.php">ประวัติการถอน</a><a href="wallet_add.php">ประวัติการเติม</a><a href="wallet_withdraw.php">ถอนเงิน</a><a href="wallet.php">เติมเงิน</a><a href="index.php">หน้าหลัก</a></div> 
    <div class="content">
      <form action="wallet_up.php" method = "post">
</div>
        <div class="user-details">
          <div class="input-box">

          
          <br>
          <br>
          <div class = "center_status">
           <h2> <span class="details">ถอนเงิน</span> </h2> 
            <br>
            </div>
            <h3>กรอกชื่อธนาคาร</h3>
            <input type="text" name="payment_type" placeholder="กรุณาชื่อธนาคาร" required>
            <br>
            <br>
            <h3>กรอกชื่อผู้รับเงิน</h3>
            <input type="text" name="bank_name" placeholder="กรุณาชื่อผู้รับเงิน" required>
            <br>
            <br>
            <h3 >กรอกเลขบัญชี</h3>
            <input type="text" name="bank_number" placeholder="กรุณาเลขบัญชี" required>
          </div>
          <br>
          <br>
        <button   type="submit" value = "upload" name = "withdraw"  class="uploadbtn">ถอนเงิน</button>
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