
## Zzyc-supply-php-sdk

Zzyc-supply-php-sdk是中泽云仓官方SDK的Composer封装，支持php项目的中台API对接。
## 安装

* 通过composer，这是推荐的方式，可以使用composer.json 声明依赖，或者运行下面的命令。
```bash
$ composer require Zzyc-supply/php-sdk
```
* 直接下载安装，SDK 没有依赖其他第三方库，但需要参照 composer的autoloader，增加一个自己的autoloader程序。

## 运行环境

    php: >=7.0

## 使用方法

```php    

	/**
	 * Created by PhpStorm.
	 * User: Zzyc
	 * Date: 2022/4/17
	 * Time: 2:04 PM
	 */

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

```    

## 供应链平台

官网网址 https://www.xzwl1688.com/  

浙江中台H5网址 https://zj.center.xzwl1688.com/  

安徽中台H5网址 https://ah.center.xzwl1688.com/  

江西中台H5网址 https://jx.center.xzwl1688.com/  