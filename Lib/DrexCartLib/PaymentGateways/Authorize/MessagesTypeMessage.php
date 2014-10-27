<?php


/**
 * 
 * @package apiClasses.apiObjects.messages
 */
class MessagesTypeMessage
{

  /**
   * 
   * @var string $code
   * @access public
   */
  public $code = null;

  /**
   * 
   * @var string $text
   * @access public
   */
  public $text = null;

  /**
   * 
   * @param string $code
   * @param string $text
   * @access public
   */
  public function __construct($code, $text)
  {
    $this->code = $code;
    $this->text = $text;
  }

}
