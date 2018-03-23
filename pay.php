<?php
/**
 * 确认支付订单
 */
session_start();
ini_set('session.save_path', '/php_sessions/');
//6个钟头
ini_set('session.gc_maxlifetime', 21600);
//保存一天
//$lifeTime = 24 * 3600;
//setcookie(session_name(), session_id(), time() + $lifeTime, "/");
include_once 'Cart_Class.php';
include 'headlink.php';
$cart = new Cart();
$name = isset($_POST['name']) ? $_POST['name'] : "";
$phone = isset($_POST['phone']) ? $_POST['phone'] : "";
$address = isset($_POST['province']) ? $_POST['province'] : "";
$address .= isset($_POST['address']) ? $_POST['address'] : "";
$postcode = isset($_POST['postcode']) ? $_POST['postcode'] : "";
//print_r($_SESSION);
?>
<div style="height:auto;">
    <div class="showbooks">
        <div class="cart_header">
            <div class="heade">
                <a href="index.php" class="navbar-brand"><em>J</em>store</a>
            </div>
            <div class="clear"></div>
        </div>


        <div style="border: 2px solid #7BA7AB;margin: 65px;">

            <div class="category">
                <ul>
                    <li>商品信息</li>
                    <li>单价</li>
                    <li>数量</li>
                </ul>
                <div class="clear"></div>
            </div>
            <?php
            if ($_SESSION['cart']) {
                foreach ($_SESSION['cart'] as $k => $val) {
                    ?>

                    <div class="showcart">


                        <div id="cartdata">
                            <ul>
                                <li style="float: left;width: 247px;"><?php echo '书名：' . $val['product_name'] ?></li>
                                <li style="float: left;width: 247px;"> ¥ <?php echo $val['price'] ?></li>
                                <li style="float: left;width: 247px;"><?php echo $val['qty'] ?></li>

                            </ul>
                            <div class="clear"></div>
                        </div>
                    </div>

                    <?php
                }
            } else {
                ?>
                <div style="height:auto;">
                    <div class="showcart">
                        <p style="position:relative;top: 400px;text-align: center;"><?php echo '购物车还没有物品，快去选购商品吧！'; ?></p>
                    </div>
                </div>
            <?php }
            ?>
            <div class="clear"></div>
            <div style="border-top:2px solid #7BA7AB; ">
                <p style="text-align: right;position: relative;right: 10px;top: 6px;">店铺合计：<?php echo $cart->getPrice(); ?></p>
            </div>
        </div>
        <div class="clear"></div>
        <div class="order_mes">
            <form action="pay_action.php" method="post">
                <!-- 一个隐藏的表单用来传递数据   -->
                <input type="hidden" name="name" value="<?php echo $name ?>"/>
                <input type="hidden" name="phone" value="<?php echo $phone ?>"/>
                <input type="hidden" name="address" value="<?php echo $address ?>"/>
                <input type="hidden" name="postcode" value="<?php echo $postcode ?>"/>
                <!-- end  -->
                <!-- 用于显示收货信息的列表让用户确认信息-->
                <ul>
                    <li name="name">收货人：<?php echo $name; ?></li>
                    <li name="phone">电话：<?php echo $phone; ?></li>
                    <li name="address">地址：<?php echo $address; ?></li>
                    <li name="postcode">邮编：<?php echo $postcode; ?></li>
                </ul>
                <div class="check_btn">
                    <input type="submit" value="确认支付订单">
                </div>
                <div class="clear"></div>
            </form>
            <div class="clear"></div>
        </div>
    </div>
    <div class="clear"></div>
</div>


<?php include 'footer.php'; ?>
