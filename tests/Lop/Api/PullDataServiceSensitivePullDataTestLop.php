<?php
include_once __DIR__ . '/../../../../vendor/autoload.php';
use Lop\Api\LopDomainClient;
use Lop\Api\Request\LCP_00072403\PullDataServiceSensitivePullDataLopRequest;
use Lop\Api\Domain\LCP_00072403\PullDataService\SensitivePullDataReqDTO;
use Lop\Api\Domain\LCP_00072403\PullDataService\EwPrintDataInfo;
use Lop\Api\Plugin\Factory\HmacPluginFactory;
use Lop\Api\Plugin\Factory\OAuth2PluginFactory;
//测试demo
$client = new LopDomainClient("SERVER_URL");
$request = new PullDataServiceSensitivePullDataLopRequest();
    $sensitivePullDataReqDTO = new SensitivePullDataReqDTO();
            $sensitivePullDataReqDTO->setPin("test");
            $sensitivePullDataReqDTO->setCpCode("test");
            $sensitivePullDataReqDTO->setObjectId("test");
        $request->setSensitivePullDataReqDTO($sensitivePullDataReqDTO);

//参数校验
$request->check();
$resp = $client->execute($request);
echo json_encode($resp,JSON_UNESCAPED_UNICODE);
echo PHP_EOL;
