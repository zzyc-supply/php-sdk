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

//002获取开发者登录信息
$param = ['account'=>$appKey, 'password'=>$appSecret];
$response = json_decode($supplyClient->getApiResponse("get","/api/user",$param));

//003获取开发者余额及帐单信息
//$param = [];
//$response = json_decode($supplyClient->getApiResponse("get","/api/user",$param));

var_dump($response);