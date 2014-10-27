<?php


/**
 * 
 * @package apiClasses.apiObjects.item
 */
class returnedItem
{

  /**
   * 
   * @var string $id
   * @access public
   */
  public $id = null;

  /**
   * 
   * @var dateTime $dateUTC
   * @access public
   */
  public $dateUTC = null;

  /**
   * 
   * @var dateTime $dateLocal
   * @access public
   */
  public $dateLocal = null;

  /**
   * 
   * @var string $code
   * @access public
   */
  public $code = null;

  /**
   * 
   * @var string $description
   * @access public
   */
  public $description = null;

  /**
   * 
   * @param string $id
   * @param dateTime $dateUTC
   * @param dateTime $dateLocal
   * @param string $code
   * @param string $description
   * @access public
   */
  public function __construct($id, $dateUTC, $dateLocal, $code, $description)
  {
    $this->id = $id;
    $this->dateUTC = $dateUTC;
    $this->dateLocal = $dateLocal;
    $this->code = $code;
    $this->description = $description;
  }

}
