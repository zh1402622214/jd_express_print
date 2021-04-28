<?php
namespace Lop\Api\Domain\LCP_00072403\PullDataService;

use Lop\Api\Util\RequestCheckUtil;
use JsonSerializable;

class WayBillInfo implements JsonSerializable {

    /**
     * 商城订单号
     */
    private $orderNo;
    /**
     * 京东运单号
     */
    private $jdWayBillCode;
    /**
     * 运单号
     */
    private $wayBillCode;
    /**
     * 是否pop订单，1：pop订单；不填或者0：非pop订单
     */
    private $popFlag;

    public function setOrderNo($orderNo){
       $this->orderNo = $orderNo;
    }
    
    public function getOrderNo(){
       return $this->orderNo;
    }
    public function setJdWayBillCode($jdWayBillCode){
       $this->jdWayBillCode = $jdWayBillCode;
    }
    
    public function getJdWayBillCode(){
       return $this->jdWayBillCode;
    }
    public function setWayBillCode($wayBillCode){
       $this->wayBillCode = $wayBillCode;
    }
    
    public function getWayBillCode(){
       return $this->wayBillCode;
    }
    public function setPopFlag($popFlag){
       $this->popFlag = $popFlag;
    }
    
    public function getPopFlag(){
       return $this->popFlag;
    }

    public function jsonSerialize() {
        return [
            'orderNo' => $this->orderNo,
             
            'jdWayBillCode' => $this->jdWayBillCode,
             
            'wayBillCode' => $this->wayBillCode,
             
            'popFlag' => $this->popFlag,
             
        ];
    }
    
    public function check() {

       RequestCheckUtil::checkString($this->orderNo,"orderNo");

       RequestCheckUtil::checkString($this->jdWayBillCode,"jdWayBillCode");

       RequestCheckUtil::checkString($this->wayBillCode,"wayBillCode");

       RequestCheckUtil::checkNumeric($this->popFlag,"popFlag");
    }
}