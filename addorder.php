<?php
/*
 *  * 填写订单信息
 */
header("Content-type:text/html;charset=utf-8");
session_start();
ini_set('session.save_path', '/php_sessions/');
//6个钟头
ini_set('session.gc_maxlifetime', 21600);
include_once 'Cart_Class.php';
include 'headlink.php';
?>
<div>
    <div class="showbooks">
        <div class="cart_header">
            <div class="heade">
                <a href="index.php" class="navbar-brand"><em>J</em>store</a>
            </div>
            <div class="clear"></div>
        </div>
        <div >
            <h2 style="text-align: center;">填写收货地址</h2>
            <div class="mes">
                <form name="addform" action="pay.php" method="post" onsubmit="return checkForm()">
                    <ul>
                        <li><span>收货人：&nbsp;&nbsp;&nbsp;&nbsp;<input id="" name="name" type="text" style="width:400px;"></span></li>
                        <li><span>手机号：&nbsp;&nbsp;&nbsp;&nbsp;<input id="" name="phone" type="text" style="width:400px;"></span></li>

                        <li>
                            所在地区：
                            <select name="province" style="width: 400px;height: 40px;">
                                <option value="北京市">北京市</option>
                                <option value="天津市">天津市</option>
                                <option value="上海市">上海市</option>
                                <option value="重庆市">重庆市</option>
                                <option value="河北省">河北省</option>
                                <option value="山西省">山西省</option>
                                <option value="辽宁省">辽宁省</option>
                                <option value="吉林省">吉林省</option>
                                <option value="黑龙江省">黑龙江省</option>
                                <option value="江苏省">江苏省</option>
                                <option value="浙江省">浙江省</option>
                                <option value="安徽省">安徽省</option>
                                <option value="福建省">福建省</option>
                                <option value="江西省">江西省</option>
                                <option value="山东省">山东省</option>
                                <option value="河南省">河南省</option>
                                <option value="湖北省">湖北省</option>
                                <option value="湖南省">湖南省</option>
                                <option value="广东省">广东省</option>
                                <option value="海南省">海南省</option>
                                <option value="四川省">四川省</option>
                                <option value="贵州省">贵州省</option>
                                <option value="云南省">云南省</option>
                                <option value="陕西省">陕西省</option>
                                <option value="甘肃省">甘肃省</option>
                                <option value="青海省">青海省</option>
                                <option value="台湾省">台湾省</option>
                                <option value="内蒙古自治区">内蒙古自治区</option>
                                <option value="广西壮族自治区">广西壮族自治区</option>
                                <option value="西藏自治区">西藏自治区</option>
                                <option value="宁夏回族自治区">宁夏回族自治区</option>
                                <option value="新疆维吾尔自治区">新疆维吾尔自治区</option>
                                <option value="香港特别行政区">香港特别行政区</option>
                                <option value="澳门特别行政区">澳门特别行政区</option>
                            </select>
                        </li>
                        <li>
                            <span>详细地址：&nbsp;<input id="" value="" name="address" type="text" style="width:400px;"></span>
                        </li>
                        <li><span>邮编：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="" name="postcode" value="" type="text" style="width:400px;"></span></li>

                    </ul>
                    <div class="next_btn">
                        <input  class="" type="submit"  value="下一步" >
                    </div>

                </form>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php include 'footer.php'; ?>
<script language="javascript" type="text/javascript">
    //提交表单前用onsubmit（）进行表单中的数据验证，符合规则便执行提交，否则取消提交
    function checkForm()
    {
        if (addform.name.value == "" || addform.phone.value == "" || addform.address.value == ""||addform.postcode.value == "") {
            alert("数据不能为空！");
            return false;//取消提交
        } else {
            return ture;//执行提交
        }
    }
</script>