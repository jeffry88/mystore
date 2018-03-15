<?php

class Cart {

    static protected $ins; //实例变量
    public $item = array(); //放商品容器

    //禁止外部调用

   final protected function __construct() {
        
    }

    //禁止克隆
   final protected function __clone() {
        
    }

    //类内部实例化
    public static function getIns() {
        if (!(self::$ins instanceof self)) {
            self::$ins = new self();
            return self::$ins;
        }
        return self::$ins;
    }

    //全局有效  /?id=112  ?id=121d 都行
    public static function getCart($sesSuffix){
		if(!isset($_SESSION['cart'.$sesSuffix])||!($_SESSION['cart'.$sesSuffix] instanceof self)){
			$_SESSION['cart'.$sesSuffix]=self::getIns();
		}
		return $_SESSION['cart'.$sesSuffix];
	}

    //入列时的检验，是否在$item里存在
    public function inItem($product_name) {
        if ($this->getTypes() == 0) {
            return false;
        }
        //这里检验商品是否相同是通过goods_id来检测，并未通过商品名称name来检测，具体情况可做修改
        if (!(array_key_exists($product_name, $this->item))) {
            return false;
        } else {
            return $this->item[$product_name]['qty']; //返回此商品个数
        }
    }

    //添加一个商品
    /*
     * $product_id 唯一id
     * product_name 名称
     * qty 数量
     * price 单价
     */
    public function addItem($product_id, $product_name, $qty, $price) {
        if ($this->inItem($product_id) != false) {
            
            return $this->item[$product_id]['qty'] += $qty;
        }
        $this->item[$product_id] = array(); //一个商品为一个数组
        $this->item[$product_id]['qty'] = $qty; //这一个商品的购买数量
        $this->item[$product_id]['product_name'] = $product_name; //商品名字
        $this->item[$product_id]['price'] = floatval($price); //商品单价
    }

    //减少一个商品
    public function reduceItem($product_id, $qty) {
        if ($this->inItem($product_id) == false) {
            return;
        }
        if ($qty > $this->getQty($product_id)) {
            unset($this->item[$product_id]);
        } else {
            $this->item[$product_id]['qty'] -= $qty;
        }
    }

    //去掉一个商品
    public function delItem($product_id) {
        if ($this->inItem($product_id)) {
            unset($this->item[$product_id]);
        }
    }

    //返回购买商品列表
    public function itemList() {
        return $this->item;
    }

    //一共有多少种商品
    public function getTypes() {
        return count($this->item);
    }

    //获得一种商品的总个数
    public function getQty($product_id) {
        return $this->item[$product_id]['qty'];
    }

    // 查询购物车中有多少个商品
    public function getNumber() {
        $qty = 0;
        if ($this->getTypes() == 0) {
            return 0;
        }
        foreach ($this->item as $k => $v) {
            $qty += $v['qty'];
        }
        return $qty;
    }

    //计算总价格
    public function getPrice() {
        $price = 0;
        if ($this->getTypes() == 0) {
            return 0;
        }
        foreach ($this->item as $k => $v) {
            $price += floatval($v['qty'] * $v['price']);
        }
        return $price;
    }

    //清空购物车
    public function emptyItem() {
        $this->item = array();
    }

}
