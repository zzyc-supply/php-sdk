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

//025余额帐单记录流水
$param = [
	'type'=>0, //0:全部 1:支出 2:收入
	'page'=>1, //
	'limit'=>10 //
];
$response = json_decode($supplyClient->getApiResponse("get","/api/user/bill",$param));


var_dump($response);