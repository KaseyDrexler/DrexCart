<?php


/**
 * 
 * @package apiClasses.apiObjects.order
 */
class OrderExType
{

  /**
   * 
   * @var string $purchaseOrderNumber
   * @access public
   */
  public $purchaseOrderNumber = null;

  /**
   * 
   * @param string $purchaseOrderNumber
   * @access public
   */
  public function __construct($purchaseOrderNumber)
  {
    $this->purchaseOrderNumber = $purchaseOrderNumber;
  }

}
