<?php
namespace Lop\Api\Domain\LCP_00072403\PullDataService;

use Lop\Api\Util\RequestCheckUtil;
use JsonSerializable;

class EwPrintDataInfo implements JsonSerializable {

    /**
     * 商城订单号
     */
    private $orderNo;
    /**
     * 运单号
     */
    private $wayBillNo;
    /**
     * 运单数据
     */
    private $ewPrintData;

    public function setOrderNo($orderNo){
       $this->orderNo = $orderNo;
    }
    
    public function getOrderNo(){
       return $this->orderNo;
    }
    public function setWayBillNo($wayBillNo){
       $this->wayBillNo = $wayBillNo;
    }
    
    public function getWayBillNo(){
       return $this->wayBillNo;
    }
    public function setEwPrintData($ewPrintData){
       $this->ewPrintData = $ewPrintData;
    }
    
    public function getEwPrintData(){
       return $this->ewPrintData;
    }

    public function jsonSerialize() {
        return [
            'orderNo' => $this->orderNo,
             
            'wayBillNo' => $this->wayBillNo,
             
            'ewPrintData' => $this->ewPrintData,
             
        ];
    }
    
    public function check() {

       RequestCheckUtil::checkString($this->orderNo,"orderNo");

       RequestCheckUtil::checkString($this->wayBillNo,"wayBillNo");

       RequestCheckUtil::checkString($this->ewPrintData,"ewPrintData");
    }
}