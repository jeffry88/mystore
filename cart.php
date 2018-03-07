<?php
session_start(86400);
include_once 'Cart_Class.php';
include 'headlink.php';
$cart = new Cart();
//$cart = Cart::getCart('_test'); 
//$cart = Cart::getPrice();
//echo $_SESSION['cart_test']->item[10001]['product_name'];
//print_r($_SESSION);
print_r($_SESSION['cart']);
echo $cart->getPrice();
//$cart->clear();
//$_SESSION['cart_test'] = array();
//echo $_SESSION['cart_test']->delItem(10010);
//echo $_SESSION;
?>

<div style="height:550px;">
    <?php
    if ($_SESSION['cart']) {
        foreach ($_SESSION['cart'] as $k => $val) {
            ?>
    <div>
        
    </div>
            echo $val['product_id'] . "<br>";
            <?php
        }
    } else {
        echo '购物车还没有物品，快去选购商品吧！';
    }
    ?>
</div>
<?php include 'footer.php'; ?>