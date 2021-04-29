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
class PullDataServicePullDataLopRequest extends DomainAbstractRequest{
    private $domainHttpParam;
   /**
    * 获取打印数据参数
    */
    private $pullDataReqDTO;


    public function setPullDataReqDTO($pullDataReqDTO){
        $this->pullDataReqDTO=$pullDataReqDTO;
}

public function getPullDataReqDTO(){
    return $this->pullDataReqDTO;
}


public function getApiMethod(){
    return "/PullDataService/pullData";
}

public function getAppJsonParams() {
    $apiParams = array();
        $apiParams[] = $this->pullDataReqDTO;
    return json_encode($apiParams);
}
public function getDomain(){
    return "jdcloudprint";
}
public function getBodyObject(){
    $apiParams = array();
        $apiParams[] = $this->pullDataReqDTO;
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

    RequestCheckUtil::checkObject($this->pullDataReqDTO,"pullDataReqDTO");
    if(isset($this->pullDataReqDTO) && method_exists($this->pullDataReqDTO,"check")) {
        $this->pullDataReqDTO->check();
    }
}
}