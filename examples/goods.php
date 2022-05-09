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

//004获取地区分类列表
$param = [];//返回全部分类
$response = json_decode($supplyClient->getApiResponse("get","/api/store/product/category/lst",$param));


//005获取商品列表
/*
$param = [
	'cate_id'=>3, //分类id
	'order'=>'price_asc', //排序方式: 'is_new', 新品 'price_asc', 价格升序 'price_desc', 价格降序 'rate', 评分 'sales' 销量 默认传空或不传
	'price_on'=>1, //价格区间 最低价
	'price_off'=>10, //价格区间 最高价
	'brand_id'=> '', //品牌id
	'keyword'=>'绿豆', //搜索关键字
	'page'=>1, 
	'limit'=>10
];
$response = json_decode($supplyClient->getApiResponse("get","/api/product/spu/lst",$param));
*/


//006获取商品详情
/*
$param = [
	'id'=>3 //商品ID
];
$response = json_decode($supplyClient->getApiResponse("get","/api/store/product/detail/".$param['id'],$param));
*/


//007获取品牌列表
/*
$param = [
	'cate_id'=>4, //平台商品的分类id
	'keyword'=>'' //商品搜索的关键字
];
$response = json_decode($supplyClient->getApiResponse("get","/api/store/product/brand/lst",$param));
*/


//008获取品牌列表（可选）
/*
$param = [
	'product_id'=>2, //商品id
	'type'=>'wechat', //wechat = 微信 routine= 小程序(暂未发布小程序)
	'product_type'=>0 //商品类型 0普通商品
];
$response = json_decode($supplyClient->getApiResponse("get","/api/store/product/qrcode/".$param['product_id'],$param));
*/

var_dump($response);