<?php
namespace Lop\Api\Domain\LCP_00072403\PullDataService;

use Lop\Api\Util\RequestCheckUtil;
use JsonSerializable;

class SensitivePullDataReqDTO implements JsonSerializable {

    /**
     * pin授权码/商家授权pin
     */
    private $pin;
    /**
     * 物流公司编码
     */
    private $cpCode;
    /**
     * 本次获取打印数据请求ID，长度不超过20位
     */
    private $objectId;
    /**
     * 运单信息，包括待明文运单数据和商城订单号
     */
    private $ewPrintDataInfos;
    /**
     * 参数,key有文档规范 商城商家编码:eCustomerCode(String)
     */
    private $parameters;

    public function setPin($pin){
       $this->pin = $pin;
    }
    
    public function getPin(){
       return $this->pin;
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
    public function setEwPrintDataInfos($ewPrintDataInfos){
       $this->ewPrintDataInfos = $ewPrintDataInfos;
    }
    
    public function getEwPrintDataInfos(){
       return $this->ewPrintDataInfos;
    }
    public function setParameters($parameters){
       $this->parameters = $parameters;
    }
    
    public function getParameters(){
       return $this->parameters;
    }

    public function jsonSerialize() {
        return [
            'pin' => $this->pin,
             
            'cpCode' => $this->cpCode,
             
            'objectId' => $this->objectId,
             
            'ewPrintDataInfos' => $this->ewPrintDataInfos,
             
            'parameters' => $this->parameters,
             
        ];
    }
    
    public function check() {

       RequestCheckUtil::checkString($this->pin,"pin");

       RequestCheckUtil::checkString($this->cpCode,"cpCode");

       RequestCheckUtil::checkString($this->objectId,"objectId");

       RequestCheckUtil::checkArray($this->ewPrintDataInfos,"ewPrintDataInfos");
       if(isset($this->ewPrintDataInfos)) {
           $arrlength=count($this->ewPrintDataInfos);
           for($index=0;$index<$arrlength;$index++){
               if(isset($this->ewPrintDataInfos[$index]) && method_exists($this->ewPrintDataInfos[$index],"check")) {
                   $this->ewPrintDataInfos[$index]->check();
               }
           }
       }

    }
}