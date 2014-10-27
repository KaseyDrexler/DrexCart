<?php


/**
 * 
 * @package apiClasses.apiObjects.a
 */
class ARBGetSubscriptionListSorting
{

  /**
   * 
   * @var ARBGetSubscriptionListOrderFieldEnum $orderBy
   * @access public
   */
  public $orderBy = null;

  /**
   * 
   * @var boolean $orderDescending
   * @access public
   */
  public $orderDescending = null;

  /**
   * 
   * @param ARBGetSubscriptionListOrderFieldEnum $orderBy
   * @param boolean $orderDescending
   * @access public
   */
  public function __construct($orderBy, $orderDescending)
  {
    $this->orderBy = $orderBy;
    $this->orderDescending = $orderDescending;
  }

}
