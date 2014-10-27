<?php


/**
 * 
 * @package apiClasses.apiObjects.profile
 */
class ProfileTransAmountType
{

  /**
   * 
   * @var float $amount
   * @access public
   */
  public $amount = null;

  /**
   * 
   * @var ExtendedAmountType $tax
   * @access public
   */
  public $tax = null;

  /**
   * 
   * @var ExtendedAmountType $shipping
   * @access public
   */
  public $shipping = null;

  /**
   * 
   * @var ExtendedAmountType $duty
   * @access public
   */
  public $duty = null;

  /**
   * 
   * @var LineItemType[] $lineItems
   * @access public
   */
  public $lineItems = null;

  /**
   * 
   * @param float $amount
   * @param ExtendedAmountType $tax
   * @param ExtendedAmountType $shipping
   * @param ExtendedAmountType $duty
   * @param LineItemType[] $lineItems
   * @access public
   */
  public function __construct($amount, $tax, $shipping, $duty, $lineItems)
  {
    $this->amount = $amount;
    $this->tax = $tax;
    $this->shipping = $shipping;
    $this->duty = $duty;
    $this->lineItems = $lineItems;
  }

}
