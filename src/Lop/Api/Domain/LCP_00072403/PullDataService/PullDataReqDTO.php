<?php
namespace Lop\Api\Domain\LCP_00072403\PullDataService;

use Lop\Api\Util\RequestCheckUtil;
use JsonSerializable;

class PullDataReqDTO implements JsonSerializable {

    /**
     * pin授权码/商家授权pin
     */
    private $pin;
    /**
     * 参数,key有文档规范。电子面单商家编码:ewCustomerCode(String)（青龙业主号），商城商家编码:eCustomerCode(String)
     */
    private $parameters;
    /**
     * 物流公司编码
     */
    private $cpCode;
    /**
     * 本次获取打印数据请求ID，长度不超过20位
     */
    private $objectId;
    /**
     * 运单信息列表 最多支持10条
     */
    private $wayBillInfos;

    public function setPin($pin){
       $this->pin = $pin;
    }
    
    public function getPin(){
       return $this->pin;
    }
    public function setParameters($parameters){
       $this->parameters = $parameters;
    }
    
    public function getParameters(){
       return $this->parameters;
    }
    public function setCpCode($cpCode){
       $this->cpCode = $cpCode;
    }
    
    public function getCpCode(){
       return $this->cpCode;
    }
    public function setObjectId($objectId){
       $this->objectId = $objectId;
    }
    
    public function getObjectId(){
       return $this->objectId;
    }
    public function setWayBillInfos($wayBillInfos){
       $this->wayBillInfos = $wayBillInfos;
    }
    
    public function getWayBillInfos(){
       return $this->wayBillInfos;
    }

    public function jsonSerialize() {
        return [
            'pin' => $this->pin,
             
            'parameters' => $this->parameters,
             
            'cpCode' => $this->cpCode,
             
            'objectId' => $this->objectId,
             
            'wayBillInfos' => $this->wayBillInfos,
             
        ];
    }
    
    public function check() {

       RequestCheckUtil::checkString($this->pin,"pin");


       RequestCheckUtil::checkString($this->cpCode,"cpCode");

       RequestCheckUtil::checkString($this->objectId,"objectId");

       RequestCheckUtil::checkArray($this->wayBillInfos,"wayBillInfos");
       if(isset($this->wayBillInfos)) {
           $arrlength=count($this->wayBillInfos);
           for($index=0;$index<$arrlength;$index++){
               if(isset($this->wayBillInfos[$index]) && method_exists($this->wayBillInfos[$index],"check")) {
                   $this->wayBillInfos[$index]->check();
               }
           }
       }
    }
}