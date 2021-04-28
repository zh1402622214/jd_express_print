<?php
include_once __DIR__ . '/../../../../vendor/autoload.php';
use Lop\Api\LopDomainClient;
use Lop\Api\Request\LCP_00072403\PullDataServiceGetTemplateListLopRequest;
use Lop\Api\Domain\LCP_00072403\PullDataService\GetTemplateListReqDTO;
use Lop\Api\Plugin\Factory\HmacPluginFactory;
use Lop\Api\Plugin\Factory\OAuth2PluginFactory;
//测试demo
$client = new LopDomainClient("SERVER_URL");
$request = new PullDataServiceGetTemplateListLopRequest();
    $getTemplateListReqDTO = new GetTemplateListReqDTO();
            $getTemplateListReqDTO->setPin("test");
            $getTemplateListReqDTO->setCpCode("test");
            $getTemplateListReqDTO->setTemplateType("test");
            $getTemplateListReqDTO->setWayTempleteType("test");
            $getTemplateListReqDTO->setIsvResourceType("test");
            $getTemplateListReqDTO->setTemplateId("test");
        $request->setGetTemplateListReqDTO($getTemplateListReqDTO);

//参数校验
$request->check();
$resp = $client->execute($request);
echo json_encode($resp,JSON_UNESCAPED_UNICODE);
echo PHP_EOL;
