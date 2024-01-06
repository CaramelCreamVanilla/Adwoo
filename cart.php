<?php 
session_start();

    include("server.php");
    $sum_total = 0 ;
if(!empty($_SESSION['cart']))
{
foreach($_SESSION['cart'] as $key => $value)
{

    $sql_qury_cart = "SELECT * FROM product Where prod_id = '$key' ";
    $sql_cart = mysqli_query($conn,$sql_qury_cart);
    $cart_sql = mysqli_fetch_array($sql_cart);
    $show_img_cart = $cart_sql['name_prod_img'];
    $name_prod = $cart_sql['name_prod'];
    $price_prod = $cart_sql['price_prod'];
    $total_price_prod = $cart_sql['price_prod']*$value;
    $sum_total = $sum_total+$total_price_prod;



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" href = "css//status.css">
    <title>Document</title>
</head>
<body>
    
<form  method="post" action="cart_db.php">



<div class="small-contriner cart-page">
  <table>
    <tr>
      <th>Product</th>
      <th>Quantity</th>
      <th>Total Price</th>
    </tr>
    <tr>
      <td>
        <div class="cart-info">
          <img src="upload-product/<?php echo $show_img_cart; ?>">
          <div>
            <p><?php echo  $name_prod; ?></p>
            <small>Price : <?php echo number_format($price_prod, 2) ; ?></small>
              <br>
              
        <button class="updatebutton2" type="submit" name = "delete_prod" value = "<?php echo $key; ?>" >ลบสินค้า</button>
          </div>
        </div>
      </td>
      <td><?php echo "<input type='number' name='value_pro' value='$value' size='2'/></td>"; ?></td>
      <td><?php echo number_format($total_price_prod, 2); ?> ฿  <button  class="updatebutton" type="submit" name = "chang" value = "<?php echo $key; ?>" >ปรับปรุงสินค้า</button> </td>
    </tr>
    <tr>
      <td>
  </table>


</form>


<?php   } 



}
if($sum_total ==0)
{
  echo "<h1>กรุณาเลือกสินค้า</h1>"; 
}

?>
<?php 
    if($sum_total >0)
    {

?>

<div class="total-price">
    <table>
    <form  method="post" action="pay.php" >
      <tr>
        <td>Subtotal</td>
        <td><?php echo number_format($sum_total, 2); ?> ฿</td>
      </tr>
      <tr>
        <td>Shipping cost</td>
        <td>    <select id="delivery"name="delivery_type">
    <?php 
    $sql_delivery = "SELECT *FROM delivery_type";
    $qury_delivery = mysqli_query($conn,$sql_delivery);
    
while($delivery_sql = mysqli_fetch_array($qury_delivery))
{ 
    
    ?>
    <option value="<?php echo $delivery_sql['delivery_type_name']; ?>"><?php echo $delivery_sql['delivery_type_name']; ?></option>
    <?php  
}?>
    </select>
    </td>
      </tr>
      <tr>
        <td>Total</td>
        <td><?php echo number_format($sum_total, 2); ?> ฿</td>
      </tr>
    </table>
  </div>
</div>


<div class="grid-container">
            <button name = "save_cart" class="button button3">สั่งซื้อ</button>
      </form>

      <form  method="post" action="clear_cart.php">
          <button class="button button4">เคลียร์ตะกร้า</button>
      </form>
</div>
<?php if(isset($_POST['cart_GG']))   
{    $_SESSION['cart_ggs'] = $_POST['cart_GG'];
?>
  <div class="grid-container2">
      <form  method="post" action="index.php">
          <button class="backbutton button5"><span>กลับหน้าหลัก</span></button>
      </form>
  </div>  
<?php }
else{

  
}

?>
  
<?php  


}
        else if(isset($_POST['cart_GG'])){
          $_SESSION['cart_ggs'] = $_POST['cart_GG'];
         //   echo "<h1>กรุณาเลือกสินค้า</h1>"; 

?>

<link rel= "stylesheet" href = "css//cart.css">
<div class="grid-container2">
      <form  method="post" action="index.php">
          <button class="backbutton button5"><span>กลับหน้าหลัก</span></button>
      </form>
  </div>  

    <?php  }
    if(isset($_SESSION['delete_cart2'])){ 
      ?>

<link rel= "stylesheet" href = "css//cart.css">
<div class="grid-container2">
      <form  method="post" action="index.php">
          <button class="backbutton button5"><span>กลับหน้าหลัก</span></button>
      </form>
  </div>  


  <?php  }?>


  

  <?php 
    if(isset($_SESSION['delete_cart'])){ 
      ?>

<link rel= "stylesheet" href = "css//cart.css">
<div class="grid-container2">
      <form  method="post" action="index.php">
          <button class="backbutton button5"><span>กลับหน้าหลัก</span></button>
      </form>
  </div>  


  <?php  }?>

  
  <?php 
    if(isset($_POST['payback'])){ 
      ?>

<link rel= "stylesheet" href = "css//cart.css">
<div class="grid-container2">
      <form  method="post" action="index.php">
          <button class="backbutton button5"><span>กลับหน้าหลัก</span></button>
      </form>
  </div>  


  <?php  }?>



</body>
</html>