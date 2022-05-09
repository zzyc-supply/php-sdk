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

//026售后客服服务工单类型
$param = [
];
$response = json_decode($supplyClient->getApiResponse("get","/api/common/feedback_type",$param));



//028工单提交
/*$param = [
	'type'=>156, //反馈子类型id
	'content'=>'手机怎么登录', //反馈内容
	'images'=>["https://xzwl1688-hwd.oss-cn-hangzhou.aliyuncs.com/5985a202204241715026148.jpg"], //图片
	'realname'=>'李先生', //姓名
	'contact'=>'33332@qq.com' //联系方式
];
$response = json_decode($supplyClient->getApiResponse("post","/api/user/feedback",$param));
*/


//029工单记录列表
/*$param = [
	'page'=>1, //
	'limit'=>10 //
];
$response = json_decode($supplyClient->getApiResponse("get","/api/user/feedback/list",$param));
*/


//030工单详情
/*$param = [
	'id'=>3 //工单id
];
$response = json_decode($supplyClient->getApiResponse("get","/api/user/feedback/detail/".$param['id'],$param));
*/

/*图片转换为 base64格式编码*/
function base64EncodeImage ($image_file) {

    $base64_image = '';

    $image_info = getimagesize($image_file);

    $image_data = fread(fopen($image_file, 'r'), filesize($image_file));

    $base64_image = 'data:' . $image_info['mime'] . ';base64,' . chunk_split(base64_encode($image_data));

    return $base64_image;

}
var_dump($response);