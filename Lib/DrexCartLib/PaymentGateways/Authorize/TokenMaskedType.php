<?php


/**
 * 
 * @package apiClasses.apiObjects.token
 */
class TokenMaskedType
{

  /**
   * 
   * @var string $tokenSource
   * @access public
   */
  public $tokenSource = null;

  /**
   * 
   * @var string $tokenNumber
   * @access public
   */
  public $tokenNumber = null;

  /**
   * 
   * @var string $expirationDate
   * @access public
   */
  public $expirationDate = null;

  /**
   * 
   * @param string $tokenSource
   * @param string $tokenNumber
   * @param string $expirationDate
   * @access public
   */
  public function __construct($tokenSource, $tokenNumber, $expirationDate)
  {
    $this->tokenSource = $tokenSource;
    $this->tokenNumber = $tokenNumber;
    $this->expirationDate = $expirationDate;
  }

}
