<?php
/**
 * Created by PhpStorm.
 * User: Zzyc
 * Date: 2022/4/17
 * Time: 2:04 PM
 */

require_once __DIR__ . '/../autoload.php';

use Zzyc\Api\SupplyClient;

$appKey = "your appkey"; 
$appSecret = "your appSecret";

try {
	$supplyClient = new SupplyClient($appKey,$appSecret);
} catch (OssException $e) {
	printf(__FUNCTION__ . "creating supplyClient instance: FAILED\n");
	printf($e->getMessage() . "\n");
	return null;
}

//009添加收货地址
$param = [
	'real_name'=>'李先生', //收货人姓名
	'phone'=>'13222281103', //收货人手机号
	'province'=>'北京市', //省
	'city'=>'北京市', //市
	'district'=> '东城区', //区
	'detail'=> '某个角落', //详细地址
	'city_id'=>2, //城市id,判断地区是否可售，比如杭州市的id为191020
	'is_default'=>1, //是否设置默认收货地址
	'address_id'=>0//请默认设置为0
];
$response = json_decode($supplyClient->getApiResponse("post","/api/user/address/create",$param));


//010城市地区列表
/*
$param = [];
$response = json_decode($supplyClient->getApiResponse("get","/api/system/city/lst",$param));
*/


//011单个或多个添加购物车
/*
$param = [
	'product_id'=>2, //商品id
	'cart_num'=>1, //购买数量
	'product_attr_unique'=>'75b1a9fe7620', //商品规格id
	'is_new'=>1,//新加购的商品
    'product_type'=>0 //普通商品
];
$response = json_decode($supplyClient->getApiResponse("post","/api/user/cart/create",$param));
*/

//012确认订单
/*
$param = [
	'cart_id'=>29, //购物车id,item 类型: string，例如：["15"]
	'address_id'=>19 //收货地址id
];
$response = json_decode($supplyClient->getApiResponse("post","/api/order/check",$param));
*/


//013提交订单
/*$param = [
	'cart_id'=>29, //购物车id,item 类型: string，例如：["15"]
	'address_id'=>19, //收货地址id
	'is_gift'=>0,//1：会员商品，0：非会员商品
	'coupon'=>[//优惠券（暂不用）
		'2'=>[
			'product'=>[],
			'store'=>''
		]
	],//
	'pay_type'=>'balance',//支付方式为开发者余额支付，请先充值余额
	'mark'=>[],//订单备注留言
	'order_type'=>0,//订单类型：0为普通订单
	'take'=>[],//默认空数组
	'receipt_data'=>[],//默认空数组
	'return_url'=>'http://zj.center.xzwl1688.com/pages/users/order_list/index'//回调跳转地址
];
$response = json_decode($supplyClient->getApiResponse("post","/api/order/create",$param));
*/

//014订单支付状态
/*
$param = [
	'order_id'=>11 //订单id
];
$response = json_decode($supplyClient->getApiResponse("get","/api/order/status/".$param['order_id'],$param));
*/


//015订单列表
/*
$param = [
	'status'=>-2, //-2=全部订单，0=未发货 1=待收货 2=已评价 3=已完成 -1=已退款
	'page'=>1,
	'limit'=>10
];
$response = json_decode($supplyClient->getApiResponse("get","/api/order/list",$param));
*/


//016订单详情/状态接口
/*
$param = [
	'order_id'=>11 //订单id
];
$response = json_decode($supplyClient->getApiResponse("get","/api/order/detail/".$param['order_id'],$param));
*/

var_dump($response);