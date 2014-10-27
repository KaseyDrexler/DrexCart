<?php


/**
 * 
 * @package apiClasses.apiObjects.credit
 */
class CreditCardType
{

  /**
   * 
   * @var string $cardCode
   * @access public
   */
  public $cardCode = null;

  /**
   * 
   * @param string $cardCode
   * @access public
   */
  public function __construct($cardCode)
  {
    $this->cardCode = $cardCode;
  }

}
