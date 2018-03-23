<?php
session_start();
ini_set('session.save_path', '/php_sessions/');
//6个钟头
ini_set('session.gc_maxlifetime', 21600);
//引入购物车类
include_once 'Cart_Class.php';
include 'headlink.php';
$cart = new Cart();
//$cart = Cart::getCart('_test'); 
//$cart = Cart::getPrice();
//echo $_SESSION['cart_test']->item[10001]['product_name'];
//print_r($_SESSION);
//print_r($_SESSION['cart']);
//echo $cart->getPrice();
//$cart->clear();
//$_SESSION['cart_test'] = array();
//echo $_SESSION['cart_test']->delItem(10010);
//echo $_SESSION;
?>

<div style="height:auto;">
    <div class="showbooks">
        <div class="cart_header">
            <div class="heade">
                <a href="index.php" class="navbar-brand"><em>J</em>store</a>
            </div>
            <div class="clear"></div>
        </div>
        <?php
        if (!empty($_SESSION['cart'])) {
            ?>
            <div style="border: 2px solid #7BA7AB;margin: 65px;">
                <div class="category">
                    <ul>
                        <li>商品信息</li>
                        <li>单价</li>
                        <li>数量</li>
                        <li>操作</li>
                    </ul>
                    <div class="clear"></div>
                </div> 
                <?php
                foreach ($_SESSION['cart'] as $k => $val) {
                    ?>

                    <div class="showcart">

                        <div class="cartdata">
                            <form action="" method="post">
                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                    <tr>
                                        <td style="width:585px;font-size: 12px;">

                                            <img src="img/product/<?php echo $val['product_pic'] ?>" style="padding-right: 35px;"><?php echo '书名：' . $val['product_name'] ?>

                                        </td>

                                        <td style="width:462px;"> ¥ <?php echo $val['price'] ?></td>
                                        <td style="width:449px;">
                                            <div id="pid" style="display: none;"><?php echo $val['product_id'] ?></div>
                                            <span>
                                                <a id="edit" class="cart_button" value="dec" href="edit_product.php?id=<?php echo $val['product_id'] ?>&action=dec">-</a>
                                                <span id="qty"><?php echo $val['qty'] ?></span>
                                                <a id="edit" class="cart_button" value="inc" href="edit_product.php?id=<?php echo $val['product_id'] ?>&action=inc">+</a>
                                            </span>
                                        </td>
                                        <td style="width:193px;">
                                            <a href="edit_product.php?id=<?php echo $val['product_id'] ?>&action=del">移除</a>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="clear"></div>

                    <?php
                }
                ?>
                <div style="border-top:2px solid #7BA7AB; ">
                    <p style="text-align: right;position: relative;right: 10px;top: 6px;">店铺合计：<?php echo $cart->getPrice(); ?></p>
                </div>
            </div><!--边框-->
            <div class="sum">
                <a href="check_login.php">提交订单</a>
                <a href="index.php">返回继续购物</a>
            </div>
            <div class="clear"></div>
            <?php
        } else {
            ?>
            <div style="height:400px;">
                <div class="showcart">
                    <img src="img/cart.png" style="position: relative;top:170px;left:80px;">
                    <p style="position:relative;top: 104px;text-align: center;font-size: 20px;"><?php echo '购物车还没有物品，快去'; ?>
                        <a href="index.php">选购</a><?php echo'商品吧！'; ?></p>
                    <div class="clear"></div>
                </div>

            </div>
            <?php
        }
        ?>
        <div class="clear"></div>
    </div>
</div>


<?php include 'footer.php'; ?>
