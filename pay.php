<?php 
session_start();
    include("server.php");
    unset($_SESSION['delete_cart']);
    unset($_SESSION['delete_cart2']);
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
<?php



$delivery_type = $_POST['delivery_type'];
$_SESSION['delivery_type'] = $delivery_type;
$qury_delivery = "SELECT *FROM delivery_type Where delivery_type_name  = '$delivery_type' ";
$sql_delivery = mysqli_query($conn,$qury_delivery);
while($show_sql_sql_delivery = mysqli_fetch_array($sql_delivery))
{


$delivery_price_sql = $show_sql_sql_delivery['delivery_price'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" href = "css//status.css">
    <title>pay</title>
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
          </div>
        </div>
      </td>
      <td><p><?php echo "x",$value;?></p></td>
      <td><?php echo number_format($total_price_prod, 2); ?> ฿  <!--button  class="updatebutton" type="submit" name = "chang" value = "</*?php echo $key; ?*/>" >ปรับปรุงสินค้า</button--> </td>
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

<div class="total-price">
    <table>
      <tr>
        <td>Subtotal</td>
        <td><?php echo number_format($sum_total, 2); ?> ฿</td>
      </tr>
      <tr>
        <td>Shipping cost</td>
        <td><?php  echo  number_format($delivery_price_sql,2); ?></td>
      </tr>
      <tr>
        <td>Total</td>
        <td><?php echo number_format($sum_total+$delivery_price_sql, 2); ?> ฿</td>
      </tr>
    </table>
  </div>
</div>

<?php }?>

<div class="grid-container">
      <form  method="post" action="save_cart.php" >
            <button name = "save_cart" class="button button3">ยืนยันการสั่งซื้อ</button>
      </form>
</div> 
<?php if(isset($_SESSION['cart_ggs']))
        {?>
<div class="grid-container2">
      <form  method="post" action="cart.php">
          <button class="backbutton button5" name="payback"><span>กลับหน้าหลัก </span></button>
      </form>
  </div>  

<?php }?>


</body>
</html>