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
class PullDataServiceGetTemplateListLopRequest extends DomainAbstractRequest{
    private $domainHttpParam;
   /**
    * 获取模板列表请求DTO
    */
    private $getTemplateListReqDTO;


    public function setGetTemplateListReqDTO($getTemplateListReqDTO){
        $this->getTemplateListReqDTO=$getTemplateListReqDTO;
}

public function getGetTemplateListReqDTO(){
    return $this->getTemplateListReqDTO;
}


public function getApiMethod(){
    return "/PullDataService/getTemplateList";
}

public function getAppJsonParams() {
    $apiParams = array();
        $apiParams[$i] = $this->getTemplateListReqDTO;
    return json_encode($apiParams);
}
public function getDomain(){
    return "jdcloudprint";
}
public function getBodyObject(){
    $apiParams = array();
        $apiParams[$i] = $this->getTemplateListReqDTO;
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

    RequestCheckUtil::checkObject($this->getTemplateListReqDTO,"getTemplateListReqDTO");
    if(isset($this->getTemplateListReqDTO) && method_exists($this->getTemplateListReqDTO,"check")) {
        $this->getTemplateListReqDTO->check();
    }
}
}