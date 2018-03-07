<?php

class Cart {

    public function Cart() {

        if (!isset($_SESSION['cart'])) {

            $_SESSION['cart'] = array();
        }
    }

/*

      添加商品

      param int $product_id 商品主键

      string $product_name 商品名称

      float $price 商品价格

      int $qty 购物数量
      
      string $product_pic 图片url

     */

    public function addItem($product_id, $product_name, $price, $qty,$product_pic) {

        //如果该商品已存在则直接加其数量

        if (isset($_SESSION['cart'][$product_id])) {

            $this->incNum($product_id, $qty);

            return;
        }

        $item = array();

        $item['product_id'] = $product_id;

        $item['product_name'] = $product_name;

        $item['price'] = $price;

        $item['qty'] = $qty;

        $item['product_pic'] = $product_pic;

        $_SESSION['cart'][$product_id] = $item;
    }

    /*

      修改购物车中的商品数量

      int $product_id 商品主键

      int $qty 某商品修改后的数量，即直接把某商品

      的数量改为$qty

     */

    public function modNum($product_id, $qty = 1) {

        if (!isset($_SESSION['cart'][$product_id])) {

            return false;
        }

        $_SESSION['cart'][$product_id]['qty'] = $qty;
    }

    /*

      商品数量+1

     */

    public function incNum($product_id, $qty = 1) {

        if (isset($_SESSION['cart'][$product_id])) {

            $_SESSION['cart'][$product_id]['qty'] += $qty;
        }
    }

    /*

      商品数量-1

     */

    public function decQty($product_id, $qty = 1) {

        if (isset($_SESSION['cart'][$product_id])) {

            $_SESSION['cart'][$product_id]['qty'] -= $qty;
        }
        //如果减少后，数量为0，则把这个商品删掉

        if ($_SESSION['cart'][$product_id]['qty'] < 1) {

            $this->delItem($product_id);
        }
    }

    /*

      删除商品

     */

    public function delItem($product_id) {

        unset($_SESSION['cart'][$product_id]);
    }

    /*

      获取单个商品

     */

    public function getItem($product_id) {

        return $_SESSION['cart'][$product_id];
    }

    /*

      查询购物车中商品的种类

     */

    public function getCnt() {

        return count($_SESSION['cart']);
    }

    /*

      查询购物车中商品的个数

     */

    public function getQty() {

        if ($this->getCnt() == 0) {

            //种数为0，个数也为0

            return 0;
        }
        $sum = 0;

        $data = $_SESSION['cart'];

        foreach ($data as $item) {

            $sum += $item['qty'];
        }

        return $sum;
    }

    /*

      购物车中商品的总金额

     */

    public function getPrice() {

        //数量为0，价钱为0

        if ($this->getCnt() == 0) {

            return 0;
        }

        $price = 0.00;
        $item = $_SESSION['cart'];
        foreach ($item as $item) {

            $price += $item['qty'] * $item['price'];
        }

        return sprintf("%01.2f", $price);
    }

    /*

      清空购物车

     */

    public function clear() {

        $_SESSION['cart'] = array();
    }

}
