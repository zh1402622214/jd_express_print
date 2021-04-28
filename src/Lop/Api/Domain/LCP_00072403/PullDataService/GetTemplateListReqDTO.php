<?php
namespace Lop\Api\Domain\LCP_00072403\PullDataService;

use Lop\Api\Util\RequestCheckUtil;
use JsonSerializable;

class GetTemplateListReqDTO implements JsonSerializable {

    /**
     * 非必填，pin授权码/商家授权pin兼容jospin，不需要传
     */
    private $pin;
    /**
     * 物流公司编码，一期仅支持JD，非必填
     */
    private $cpCode;
    /**
     * 模板类型：1，标准模板（各物流公司合作服务商标准运单模板）；2自定义模板（用于商家自己定义的模板不限于运单，可以是其他单据类型模板）；3、ISV自定义模板（ISV合作伙伴自定义模板，与合作伙伴签订软件服务协议的商家以及ISV合作伙伴都可以使用的模板，不限于运单）；4、商家自定义区（运单模板或者其他模板中自定义项内容模板，用于商家自己使用）
     */
    private $templateType;
    /**
     * 面单类型：1 快递标准面单 ,2 快递三联面单, 3 快递便携式三联单, 4 快运标准面单, 5 快运三联面单, 6 快递一联单
     */
    private $wayTempleteType;
    /**
     * isv资源类型，分为：TEMPLATE（表示模板），PRINT_ITEM（打印项），CUSTOM_AREA（预设自定义区），根据ISV合作伙伴预设的自定义区项类型获取自定义打印项
     */
    private $isvResourceType;
    /**
     * 单个模板ID，根据单个模板ID查找模板
     */
    private $templateId;

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
    public function setTemplateType($templateType){
       $this->templateType = $templateType;
    }
    
    public function getTemplateType(){
       return $this->templateType;
    }
    public function setWayTempleteType($wayTempleteType){
       $this->wayTempleteType = $wayTempleteType;
    }
    
    public function getWayTempleteType(){
       return $this->wayTempleteType;
    }
    public function setIsvResourceType($isvResourceType){
       $this->isvResourceType = $isvResourceType;
    }
    
    public function getIsvResourceType(){
       return $this->isvResourceType;
    }
    public function setTemplateId($templateId){
       $this->templateId = $templateId;
    }
    
    public function getTemplateId(){
       return $this->templateId;
    }

    public function jsonSerialize() {
        return [
            'pin' => $this->pin,
             
            'cpCode' => $this->cpCode,
             
            'templateType' => $this->templateType,
             
            'wayTempleteType' => $this->wayTempleteType,
             
            'isvResourceType' => $this->isvResourceType,
             
            'templateId' => $this->templateId,
             
        ];
    }
    
    public function check() {

       RequestCheckUtil::checkString($this->pin,"pin");

       RequestCheckUtil::checkString($this->cpCode,"cpCode");

       RequestCheckUtil::checkString($this->templateType,"templateType");

       RequestCheckUtil::checkString($this->wayTempleteType,"wayTempleteType");

       RequestCheckUtil::checkString($this->isvResourceType,"isvResourceType");

       RequestCheckUtil::checkString($this->templateId,"templateId");
    }
}