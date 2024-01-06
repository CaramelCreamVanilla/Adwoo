<?php  session_Start(); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" href = "css//register.css">
    <title>Register</title>
</head>
<body>


  <div class="container">
    <div class="title">สมัครสมาชิก</div>
    <div class="content">
      <form action="register_db.php" method = "post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">ชื่อ</span>
            <input type="text" name="name" placeholder="กรุณากรอกชื่อ" required>
          </div>
          <div class="input-box">
            <span class="details">นามสกุล</span>
            <input type="text" name="lastname"placeholder="กรุณากรอกนามสกุล" required>
          </div>
          <div class="input-box">
            <span class="details">รหัสสมาชิก</span>
            <input type="text" name="username" placeholder="กรุณากรอกรหัสสมาชิก" required>
          </div>
          <div class="input-box">
            <span class="details">ที่อยู่</span>
            <input type="text" name="address" placeholder="กรุณากรอกที่อยู่" required>
          </div>
          <div class="input-box">
            <span class="details">เบอร์โทร</span>
            <input type="tel" name="phone"placeholder="กรุณากรอกเบอร์โทร"  pattern="(0){1}[6,8,9]{1}[0-9]{8}">
          </div>
          <div class="input-box">
            <span class="details">อีเมล</span>
            <input type="email" name="email"placeholder="กรุณากรอกอีเมล" required>
          </div>
          <div class="input-box">
            <span class="details">รหัสผ่าน</span>
            <input type="password" name="password_1"placeholder="กรุณากรอกรหัสผ่าน" required>
          </div>
          <div class="input-box">
            <span class="details">ยืนยันรหัสผ่าน</span>
            <input type="password" name="password_2"placeholder="ยืนยันรหัสผ่าน" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="sex" value="man" id="dot-1">
          <input type="radio" name="sex" value="woman" id="dot-2">
          <span class="gender-title">เพศ</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">ชาย</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">หญิง</span>
          </label>
          </div>
        </div>
        <?php if(isset($_SESSION['error_rg'])): ?>
          <strong class="errormsg"><?php echo $_SESSION['error_rg']; ?></strong>
        <?php endif ?>

        <button type="submit" name="register_db" class="registerbtn">สมัครสมาชิก</button>
        <div class="container signin">
          <p>มีบัญชีอยู่แล้ว? <a href="index.php">เข้าสู่ระบบที่นี่</a>.</p>
      </div>
      </form>
    </div>
  </div>


</body>
</html>