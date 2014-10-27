<?php


/**
 * 
 * @package apiClasses.apiObjects.f
 */
class FDSFilterType
{

  /**
   * 
   * @var string $name
   * @access public
   */
  public $name = null;

  /**
   * 
   * @var string $action
   * @access public
   */
  public $action = null;

  /**
   * 
   * @param string $name
   * @param string $action
   * @access public
   */
  public function __construct($name, $action)
  {
    $this->name = $name;
    $this->action = $action;
  }

}
