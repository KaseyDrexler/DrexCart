<?php


/**
 * 
 * @package apiClasses.apiObjects.get
 */
class GetCustomerProfileIdsResponseType
{

  /**
   * 
   * @var Long[] $ids
   * @access public
   */
  public $ids = null;

  /**
   * 
   * @param Long[] $ids
   * @access public
   */
  public function __construct($ids)
  {
    $this->ids = $ids;
  }

}
