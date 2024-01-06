<?php

session_start();
$_SESSION['cart'] = array();
unset($_SESSION['cart']);
if(isset( $_SESSION['cart_ggs']))
{

unset($_SESSION['cart_ggs']);
echo "<script>alert('เคลียร์ตะกร้าเรียบร้อย');
window.location.href='index.php';
</script>";
}
if(!isset( $_SESSION['cart_ggs']))
{

    unset($_SESSION['cart_ggs']);
    echo "<script>alert('เคลียร์ตะกร้าเรียบร้อย');
    window.location.href='cart.php';
    </script>";
}

?>