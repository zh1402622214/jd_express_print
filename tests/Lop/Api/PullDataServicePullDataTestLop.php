<?php
include_once __DIR__ . '/../../../../vendor/autoload.php';
use Lop\Api\LopDomainClient;
use Lop\Api\Request\LCP_00072403\PullDataServicePullDataLopRequest;
use Lop\Api\Domain\LCP_00072403\PullDataService\WayBillInfo;
use Lop\Api\Domain\LCP_00072403\PullDataService\PullDataReqDTO;
use Lop\Api\Plugin\Factory\HmacPluginFactory;
use Lop\Api\Plugin\Factory\OAuth2PluginFactory;
//测试demo
$client = new LopDomainClient("SERVER_URL");
$request = new PullDataServicePullDataLopRequest();
    $pullDataReqDTO = new PullDataReqDTO();
            $pullDataReqDTO->setPin("test");
            $pullDataReqDTO->setCpCode("test");
            $pullDataReqDTO->setObjectId("test");
        $request->setPullDataReqDTO($pullDataReqDTO);

//参数校验
$request->check();
$resp = $client->execute($request);
echo json_encode($resp,JSON_UNESCAPED_UNICODE);
echo PHP_EOL;
