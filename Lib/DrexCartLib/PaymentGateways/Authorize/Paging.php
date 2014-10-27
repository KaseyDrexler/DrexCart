<?php


/**
 * 
 * @package apiClasses.apiObjects.paging
 */
class Paging
{

  /**
   * 
   * @var int $limit
   * @access public
   */
  public $limit = null;

  /**
   * 
   * @var int $offset
   * @access public
   */
  public $offset = null;

  /**
   * 
   * @param int $limit
   * @param int $offset
   * @access public
   */
  public function __construct($limit, $offset)
  {
    $this->limit = $limit;
    $this->offset = $offset;
  }

}
