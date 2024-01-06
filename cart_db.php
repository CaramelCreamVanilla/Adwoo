<?php
    session_start();
    if(isset($_POST['buy']))
    {
    $p_id = $_POST['buy']; 

	if(isset($_SESSION['cart'][$p_id]))
	{
			$_SESSION['cart'][$p_id]++;
	}
	else
	{
		$_SESSION['cart'][$p_id]=1;
	}
}
	
?>

<?php
    if(isset($_POST['chang']))
    {
        $id_prod =  $_POST['chang'];
        $value_prod  = $_POST['value_pro'];
        $_SESSION['cart'][$id_prod] =$value_prod;
        if(isset( $_SESSION['cart_ggs']))
        {
            $_SESSION['delete_cart2'] =  $_POST['chang'];
            unset($_SESSION['delete_cart']);

        }
        if($value_prod<1)
        {
            unset($_SESSION['cart'][$id_prod]);
        }

        header("location:cart.php");
    }
    if(isset($_POST['delete_prod']))
    {   
        $id_prod =  $_POST['delete_prod'];
        unset($_SESSION['cart'][$id_prod]);
        if(isset( $_SESSION['cart_ggs']))
        {
        $_SESSION['delete_cart'] =  $_POST['delete_prod'];
        unset($_SESSION['delete_cart2']);

        }
    }
    header("location:cart.php");
?>

