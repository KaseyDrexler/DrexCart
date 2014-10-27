<?php


/**
 * 
 * @package apiClasses.apiObjects.line
 */
class LineItemType
{

  /**
   * 
   * @var string $itemId
   * @access public
   */
  public $itemId = null;

  /**
   * 
   * @var string $name
   * @access public
   */
  public $name = null;

  /**
   * 
   * @var string $description
   * @access public
   */
  public $description = null;

  /**
   * 
   * @var float $quantity
   * @access public
   */
  public $quantity = null;

  /**
   * 
   * @var float $unitPrice
   * @access public
   */
  public $unitPrice = null;

  /**
   * 
   * @var boolean $taxable
   * @access public
   */
  public $taxable = null;

  /**
   * 
   * @param string $itemId
   * @param string $name
   * @param string $description
   * @param float $quantity
   * @param float $unitPrice
   * @param boolean $taxable
   * @access public
   */
  public function __construct($itemId, $name, $description, $quantity, $unitPrice, $taxable)
  {
    $this->itemId = $itemId;
    $this->name = $name;
    $this->description = $description;
    $this->quantity = $quantity;
    $this->unitPrice = $unitPrice;
    $this->taxable = $taxable;
  }

}
