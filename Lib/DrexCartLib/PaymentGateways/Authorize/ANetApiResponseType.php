<?php


/**
 * 
 * @package apiClasses.apiObjects.a
 */
class ANetApiResponseType
{

  /**
   * 
   * @var MessageTypeEnum $resultCode
   * @access public
   */
  public $resultCode = null;

  /**
   * 
   * @var MessagesTypeMessage[] $messages
   * @access public
   */
  public $messages = null;

  /**
   * 
   * @param MessageTypeEnum $resultCode
   * @param MessagesTypeMessage[] $messages
   * @access public
   */
  public function __construct($resultCode, $messages)
  {
    $this->resultCode = $resultCode;
    $this->messages = $messages;
  }

}
