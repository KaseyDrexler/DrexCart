<?php


/**
 * 
 * @package apiClasses.apiObjects.a
 */
class ARBGetSubscriptionListRequestType
{

  /**
   * 
   * @var ARBGetSubscriptionListSearchTypeEnum $searchType
   * @access public
   */
  public $searchType = null;

  /**
   * 
   * @var ARBGetSubscriptionListSorting $sorting
   * @access public
   */
  public $sorting = null;

  /**
   * 
   * @var Paging $paging
   * @access public
   */
  public $paging = null;

  /**
   * 
   * @param ARBGetSubscriptionListSearchTypeEnum $searchType
   * @param ARBGetSubscriptionListSorting $sorting
   * @param Paging $paging
   * @access public
   */
  public function __construct($searchType, $sorting, $paging)
  {
    $this->searchType = $searchType;
    $this->sorting = $sorting;
    $this->paging = $paging;
  }

}
