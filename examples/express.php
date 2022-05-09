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

//017订单物流查询址
$param = [
	'order_id'=>11 //订单id
];
$response = json_decode($supplyClient->getApiResponse("post","/api/order/express/".$param['order_id'],$param));


//018申请退款的订单信息
/*$param = [
	'order_id'=>11, //订单id
	'ids'=>11 //退款订单中某个订单商品的id(注：商品的id是生成订单后的订单返回的order_product_id)
];
$response = json_decode($supplyClient->getApiResponse("get","/api/refund/product/".$param['order_id'],$param));
*/


//019退款原因列表
/*$param = [
];
$response = json_decode($supplyClient->getApiResponse("get","/api/common/refund_message",$param));
*/

//020提交退款申请
/*
$param = [
	'order_id'=>11, //
	'type'=>1, //退款类型 1:单个 2:批量
	'refund_type'=>1, //退款方式:1:退款不用退货 2:退款退货
	'num'=>1, //退款的订单商品的商品件数(单个时)
	'ids'=>11, //退款产品(1,2,3,4)
	'refund_message'=>'收货地址填错了', //退款原因（可从退款原因列表中获取）
	'mark'=>'测试用', //备注
	'refund_price'=>9.90 //退款金额
];
$response = json_decode($supplyClient->getApiResponse("post","/api/refund/apply/".$param['order_id'],$param));
*/

//021退款列表
/*$param = [
	'type'=>0, //0=全部,1=进行中,2=已处理
	'page'=>1, 
	'limit'=>10
];
$response = json_decode($supplyClient->getApiResponse("get","/api/refund/list",$param));
*/

//022退款申请详情
/*$param = [
	'refund_order_id'=>6 //退款订单id
];
$response = json_decode($supplyClient->getApiResponse("get","/api/refund/detail/".$param['refund_order_id'],$param));
*/


//023退回商品物流公司列表
/*$param = [
];
$response = json_decode($supplyClient->getApiResponse("get","/api/common/express",$param));
*/

//024退款退货退回货物物流信息填写口 此接口仅限用户已经收到商品，需要退回给商家时用，用户需要填写退货物流信息
/*$param = [
	'refund_order_id'=>7, //退款订单id
	'delivery_type'=>"圆通速递",
    'delivery_id'=>"YT2214109136323 ",
    'delivery_phone'=>"13220481102",
    'delivery_mark'=>"",
    'delivery_pics'=>[]
];
$response = json_decode($supplyClient->getApiResponse("post","/api/refund/back_goods/".$param['refund_order_id'],$param));
*/

var_dump($response);