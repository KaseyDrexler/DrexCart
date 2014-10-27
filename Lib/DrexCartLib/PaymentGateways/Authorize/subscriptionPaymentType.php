<?php


/**
 * 
 * @package apiClasses.apiObjects.payment
 */
class subscriptionPaymentType
{

  /**
   * 
   * @var int $id
   * @access public
   */
  public $id = null;

  /**
   * 
   * @var int $payNum
   * @access public
   */
  public $payNum = null;

  /**
   * 
   * @param int $id
   * @param int $payNum
   * @access public
   */
  public function __construct($id, $payNum)
  {
    $this->id = $id;
    $this->payNum = $payNum;
  }

}
