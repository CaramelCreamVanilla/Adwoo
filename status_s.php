<?php 
    session_start();
    include('server.php');

    $status = $_SESSION['status'];
    $cus_id = $_SESSION['cus_id'];
    $sql_status = " SELECT * FROM cart Where cus_id = '$cus_id' AND cart_round = '$status' ";
    $qury_status = mysqli_query($conn,$sql_status);
    $tototal = 0;


    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" href = "css//upload-admin1.css">
    <link rel= "stylesheet" href = "css//status1.css">
    <link rel= "stylesheet" href = "css//checkcart1.css">  
    <title>Status</title>
</head>
<body>  


<div class="container">
    <div class="title">Status</div>
    <?php if(!$status==0){?>
    <div class="content">
        <div class="small-contriner cart-page">
            <table>

              <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Status</th>
              </tr>

                          <?php while($show_status = mysqli_fetch_array($qury_status)) {    
      $img_status=$show_status['prod_id'];
    $qury_img = "SELECT *FROM product Where prod_id = '$img_status' ";
    $sql_img = mysqli_query($conn,$qury_img);
    while($show_sql_img = mysqli_fetch_array($sql_img))
    {
        if($show_status['status_cart']==0)
        {
            $new_status = "รอชำระเงิน";
        }
        else if($show_status['status_cart']==1)
        {
            $new_status = "กำลังเตรียมของ";
        }
        else if($show_status['status_cart']==2)
        {
            $new_status = "กำลังจัดส่ง";
        }
        else {

          $new_status = "สินค้ามีปัญหา";
        }
       $price_prod_total = $show_status['price_prod_total'];
       $tototal = $tototal+$price_prod_total;
      
      ?>
              <tr>
                <td>
                  <div class="cart-info">
                  <img src="upload-product/<?php echo $show_sql_img['name_prod_img'];?>">
                    <div>
                    <p><?php echo $show_sql_img['name_prod'];?></p>
                    <small>Price : <?php echo number_format($show_sql_img['price_prod'], 2)," ฿";?></small>
                    </div>
                  </div>
                </td>
                <td><p><?php echo "x",$show_status['qty_prod_cart'];?></p></td>
               <td><?php echo number_format($price_prod_total, 2)," ฿";?></td>
              <td><?php echo $new_status; ?></td>
              </tr>
              <tr>
                <td>
<?php }}}  ?>








            </table>
            <div class="total-price">
                <table>
                  <tr>
                  <?php   $qury_delivery = "SELECT *FROM cart_total WHERE cus_id = '$cus_id'  AND  cart_round = '$status' ";
$sql_delivery = mysqli_query($conn,$qury_delivery);
while($show_sql_sql_delivery = mysqli_fetch_array($sql_delivery))
{


$cart_total = $show_sql_sql_delivery['total'];
$cart_total_id  = $show_sql_sql_delivery['cart_total_id'];
$delivery_price  = $show_sql_sql_delivery['delivery_price'];
$sumtotal =  $cart_total+$delivery_price;

?>


      <table>
      <tr>
        <td>Subtotal</td>
        <td><?php echo number_format($tototal, 2)," ฿";?></td>
      </tr>
      <tr>
        <td>Shipping cost  </td>
        <td><?php echo number_format($delivery_price, 2)," ฿";?></td>
      </tr>
      <tr>
        <td>Total</td>
        <td><?php echo number_format($sumtotal, 2)," ฿";?></td>
      </tr>

    </table>
    </div>















<?php   

$qury_delivery_s = "SELECT *FROM delivery WHERE cus_id = '$cus_id'  AND  cart_total_id = '$cart_total_id' ";
$sql_delivery_s = mysqli_query($conn,$qury_delivery_s);
$show_sql_delivery = mysqli_fetch_array($sql_delivery_s);


$del_address = $show_sql_delivery['del_address'];
$del_name = $show_sql_delivery['del_name'];
$del_lastname = $show_sql_delivery['del_lastname'];
$del_tel = $show_sql_delivery['del_tel'];
$del_date = $show_sql_delivery['del_date'];

  ?>





                
                
              
              <div class="adddetail">
              <button onclick="window.print();" class="backbutton button5" style="float:right; ">
                   ใบเสร็จชำระเงิน
            </button>
              <h3> ชื่อ นามสกุล : <?php echo $del_name," ",$del_lastname; ?> </h3>
              <br>
                <h3> ที่อยู่ : <?php echo $del_address; ?> </h3>
                <br>
                <h3> เบอร์โทรศัพท์ : <?php echo $del_tel; ?> </h3>
                <br>
                <h3> วันที่สั่งซื้อ : <?php echo $del_date; ?> </h3>
                <br>
                <h3> รอบที่สั่งซื้อ : <?php echo $status; ?> </h3>
                <br>
              </div>
            </div>

<?php }
  ?>



  <form name="store" id="store" method="post" action="status_db.php" >

      <div class="containerimg"> 
        <div class="container-text">
          <h2>กรุณาเลือกตะกร้าที่ต้องการตรวจสอบ</h2>
          <div class="box">
<select id="product"name="status_cart" >


<option value="0">กรุณาเลือกตะกร้า</option>

<?php 
    $sql_status = "SELECT DISTINCT cart_round FROM cart WHERE  cus_id = '$cus_id' ";
    $qury_status = mysqli_query($conn,$sql_status);
    
while($status_sql = mysqli_fetch_array($qury_status))
{ 
    
    ?>
    <option value="<?php echo $status_sql['cart_round']; ?>"><?php echo $status_sql['cart_round']; ?></option>




    <?php  



}?>


</select>
            </div>
        </div>
        <div class="ctnbtn">
        <input class="btncf" type="submit" value = "ดูตะกร้า" name = "status_db" required> 
      </div>

      </form>











      </div>
        <div class="user-details">



        <div class="grid-container2">
      <form  method="post" action="index.php">
          <button class="backbutton button5"><span>กลับหน้าหลัก </span></button>
      </form>
  </div>  


          </div>
    </div>
  </div>
</body>
</html>