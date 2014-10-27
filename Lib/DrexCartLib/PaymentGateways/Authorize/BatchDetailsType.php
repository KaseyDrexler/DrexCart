<?php


/**
 * 
 * @package apiClasses.apiObjects.batch
 */
class BatchDetailsType
{

  /**
   * 
   * @var string $batchId
   * @access public
   */
  public $batchId = null;

  /**
   * 
   * @var dateTime $settlementTimeUTC
   * @access public
   */
  public $settlementTimeUTC = null;

  /**
   * 
   * @var dateTime $settlementTimeLocal
   * @access public
   */
  public $settlementTimeLocal = null;

  /**
   * 
   * @var string $settlementState
   * @access public
   */
  public $settlementState = null;

  /**
   * 
   * @var string $paymentMethod
   * @access public
   */
  public $paymentMethod = null;

  /**
   * 
   * @var string $marketType
   * @access public
   */
  public $marketType = null;

  /**
   * 
   * @var string $product
   * @access public
   */
  public $product = null;

  /**
   * 
   * @var BatchStatisticType[] $statistics
   * @access public
   */
  public $statistics = null;

  /**
   * 
   * @param string $batchId
   * @param dateTime $settlementTimeUTC
   * @param dateTime $settlementTimeLocal
   * @param string $settlementState
   * @param string $paymentMethod
   * @param string $marketType
   * @param string $product
   * @param BatchStatisticType[] $statistics
   * @access public
   */
  public function __construct($batchId, $settlementTimeUTC, $settlementTimeLocal, $settlementState, $paymentMethod, $marketType, $product, $statistics)
  {
    $this->batchId = $batchId;
    $this->settlementTimeUTC = $settlementTimeUTC;
    $this->settlementTimeLocal = $settlementTimeLocal;
    $this->settlementState = $settlementState;
    $this->paymentMethod = $paymentMethod;
    $this->marketType = $marketType;
    $this->product = $product;
    $this->statistics = $statistics;
  }

}
