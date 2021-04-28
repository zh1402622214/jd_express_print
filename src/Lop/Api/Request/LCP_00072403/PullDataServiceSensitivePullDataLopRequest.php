<?php
namespace Lop\Api\Request\LCP_00072403;

use Lop\Api\Util\RequestCheckUtil;
use Lop\Api\Request\DomainAbstractRequest;
use Lop\Api\Plugin\DomainHttpParam;
use Lop\Api\LopDomainClient;
use Lop\Api\Plugin\Entity\HmacPlugin;
use Lop\Api\Plugin\Entity\OAuth2Plugin;
use Lop\Api\Plugin\Factory\OAuth2PluginFactory;
use Lop\Api\Plugin\Template\OAuth2Template;

/**
* 
*/
class PullDataServiceSensitivePullDataLopRequest extends DomainAbstractRequest{
    private $domainHttpParam;
   /**
    * 运单数据加密接口请求DTO
    */
    private $sensitivePullDataReqDTO;


    public function setSensitivePullDataReqDTO($sensitivePullDataReqDTO){
        $this->sensitivePullDataReqDTO=$sensitivePullDataReqDTO;
}

public function getSensitivePullDataReqDTO(){
    return $this->sensitivePullDataReqDTO;
}


public function getApiMethod(){
    return "/PullDataService/sensitivePullData";
}

public function getAppJsonParams() {
    $apiParams = array();
        $apiParams[$i] = $this->sensitivePullDataReqDTO;
    return json_encode($apiParams);
}
public function getDomain(){
    return "jdcloudprint";
}
public function getBodyObject(){
    $apiParams = array();
        $apiParams[$i] = $this->sensitivePullDataReqDTO;
    return $apiParams;
}
public function buildDomainHttpParam(LopDomainClient $client)
{
    $httpParam = new DomainHttpParam();
        $lopPluginList = $this->getLopPluginList();
        foreach ($lopPluginList as $index => $lopPlugin) {
                if($lopPlugin instanceof OAuth2Plugin){
                    $lopPluginTemplate = new OAuth2Template();
                    $lopPluginTemplate->buildHttpParams($httpParam,$this,$lopPlugin);
                }
        }

    $this->domainHttpParam=$httpParam;
    return $httpParam;
}

public function getDomainHttpParam()
{
    return $this->domainHttpParam;
}

public function check() {

    RequestCheckUtil::checkObject($this->sensitivePullDataReqDTO,"sensitivePullDataReqDTO");
    if(isset($this->sensitivePullDataReqDTO) && method_exists($this->sensitivePullDataReqDTO,"check")) {
        $this->sensitivePullDataReqDTO->check();
    }
}
}