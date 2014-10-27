<?php


/**
 * 
 * @package apiClasses.apiObjects.info
 */
class solutionInfo
{

  /**
   * 
   * @var string $id
   * @access public
   */
  public $id = null;

  /**
   * 
   * @var string $name
   * @access public
   */
  public $name = null;

  /**
   * 
   * @param string $id
   * @param string $name
   * @access public
   */
  public function __construct($id, $name)
  {
    $this->id = $id;
    $this->name = $name;
  }

}
