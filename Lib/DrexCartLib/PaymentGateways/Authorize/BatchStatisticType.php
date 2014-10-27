<?php


/**
 * 
 * @package apiClasses.apiObjects.batch
 */
class BatchStatisticType
{

  /**
   * 
   * @var string $accountType
   * @access public
   */
  public $accountType = null;

  /**
   * 
   * @var string $currencyCode
   * @access public
   */
  public $currencyCode = null;

  /**
   * 
   * @var float $chargeAmount
   * @access public
   */
  public $chargeAmount = null;

  /**
   * 
   * @var int $chargeCount
   * @access public
   */
  public $chargeCount = null;

  /**
   * 
   * @var float $refundAmount
   * @access public
   */
  public $refundAmount = null;

  /**
   * 
   * @var int $refundCount
   * @access public
   */
  public $refundCount = null;

  /**
   * 
   * @var int $voidCount
   * @access public
   */
  public $voidCount = null;

  /**
   * 
   * @var int $declineCount
   * @access public
   */
  public $declineCount = null;

  /**
   * 
   * @var int $errorCount
   * @access public
   */
  public $errorCount = null;

  /**
   * 
   * @var float $returnedItemAmount
   * @access public
   */
  public $returnedItemAmount = null;

  /**
   * 
   * @var boolean $returnedItemAmountSpecified
   * @access public
   */
  public $returnedItemAmountSpecified = null;

  /**
   * 
   * @var int $returnedItemCount
   * @access public
   */
  public $returnedItemCount = null;

  /**
   * 
   * @var boolean $returnedItemCountSpecified
   * @access public
   */
  public $returnedItemCountSpecified = null;

  /**
   * 
   * @var float $chargebackAmount
   * @access public
   */
  public $chargebackAmount = null;

  /**
   * 
   * @var boolean $chargebackAmountSpecified
   * @access public
   */
  public $chargebackAmountSpecified = null;

  /**
   * 
   * @var int $chargebackCount
   * @access public
   */
  public $chargebackCount = null;

  /**
   * 
   * @var boolean $chargebackCountSpecified
   * @access public
   */
  public $chargebackCountSpecified = null;

  /**
   * 
   * @var int $correctionNoticeCount
   * @access public
   */
  public $correctionNoticeCount = null;

  /**
   * 
   * @var boolean $correctionNoticeCountSpecified
   * @access public
   */
  public $correctionNoticeCountSpecified = null;

  /**
   * 
   * @var float $chargeChargeBackAmount
   * @access public
   */
  public $chargeChargeBackAmount = null;

  /**
   * 
   * @var boolean $chargeChargeBackAmountSpecified
   * @access public
   */
  public $chargeChargeBackAmountSpecified = null;

  /**
   * 
   * @var int $chargeChargeBackCount
   * @access public
   */
  public $chargeChargeBackCount = null;

  /**
   * 
   * @var boolean $chargeChargeBackCountSpecified
   * @access public
   */
  public $chargeChargeBackCountSpecified = null;

  /**
   * 
   * @var float $refundChargeBackAmount
   * @access public
   */
  public $refundChargeBackAmount = null;

  /**
   * 
   * @var boolean $refundChargeBackAmountSpecified
   * @access public
   */
  public $refundChargeBackAmountSpecified = null;

  /**
   * 
   * @var int $refundChargeBackCount
   * @access public
   */
  public $refundChargeBackCount = null;

  /**
   * 
   * @var boolean $refundChargeBackCountSpecified
   * @access public
   */
  public $refundChargeBackCountSpecified = null;

  /**
   * 
   * @var float $chargeReturnedItemsAmount
   * @access public
   */
  public $chargeReturnedItemsAmount = null;

  /**
   * 
   * @var boolean $chargeReturnedItemsAmountSpecified
   * @access public
   */
  public $chargeReturnedItemsAmountSpecified = null;

  /**
   * 
   * @var int $chargeReturnedItemsCount
   * @access public
   */
  public $chargeReturnedItemsCount = null;

  /**
   * 
   * @var boolean $chargeReturnedItemsCountSpecified
   * @access public
   */
  public $chargeReturnedItemsCountSpecified = null;

  /**
   * 
   * @var float $refundReturnedItemsAmount
   * @access public
   */
  public $refundReturnedItemsAmount = null;

  /**
   * 
   * @var boolean $refundReturnedItemsAmountSpecified
   * @access public
   */
  public $refundReturnedItemsAmountSpecified = null;

  /**
   * 
   * @var int $refundReturnedItemsCount
   * @access public
   */
  public $refundReturnedItemsCount = null;

  /**
   * 
   * @var boolean $refundReturnedItemsCountSpecified
   * @access public
   */
  public $refundReturnedItemsCountSpecified = null;

  /**
   * 
   * @param string $accountType
   * @param string $currencyCode
   * @param float $chargeAmount
   * @param int $chargeCount
   * @param float $refundAmount
   * @param int $refundCount
   * @param int $voidCount
   * @param int $declineCount
   * @param int $errorCount
   * @param float $returnedItemAmount
   * @param boolean $returnedItemAmountSpecified
   * @param int $returnedItemCount
   * @param boolean $returnedItemCountSpecified
   * @param float $chargebackAmount
   * @param boolean $chargebackAmountSpecified
   * @param int $chargebackCount
   * @param boolean $chargebackCountSpecified
   * @param int $correctionNoticeCount
   * @param boolean $correctionNoticeCountSpecified
   * @param float $chargeChargeBackAmount
   * @param boolean $chargeChargeBackAmountSpecified
   * @param int $chargeChargeBackCount
   * @param boolean $chargeChargeBackCountSpecified
   * @param float $refundChargeBackAmount
   * @param boolean $refundChargeBackAmountSpecified
   * @param int $refundChargeBackCount
   * @param boolean $refundChargeBackCountSpecified
   * @param float $chargeReturnedItemsAmount
   * @param boolean $chargeReturnedItemsAmountSpecified
   * @param int $chargeReturnedItemsCount
   * @param boolean $chargeReturnedItemsCountSpecified
   * @param float $refundReturnedItemsAmount
   * @param boolean $refundReturnedItemsAmountSpecified
   * @param int $refundReturnedItemsCount
   * @param boolean $refundReturnedItemsCountSpecified
   * @access public
   */
  public function __construct($accountType, $currencyCode, $chargeAmount, $chargeCount, $refundAmount, $refundCount, $voidCount, $declineCount, $errorCount, $returnedItemAmount, $returnedItemAmountSpecified, $returnedItemCount, $returnedItemCountSpecified, $chargebackAmount, $chargebackAmountSpecified, $chargebackCount, $chargebackCountSpecified, $correctionNoticeCount, $correctionNoticeCountSpecified, $chargeChargeBackAmount, $chargeChargeBackAmountSpecified, $chargeChargeBackCount, $chargeChargeBackCountSpecified, $refundChargeBackAmount, $refundChargeBackAmountSpecified, $refundChargeBackCount, $refundChargeBackCountSpecified, $chargeReturnedItemsAmount, $chargeReturnedItemsAmountSpecified, $chargeReturnedItemsCount, $chargeReturnedItemsCountSpecified, $refundReturnedItemsAmount, $refundReturnedItemsAmountSpecified, $refundReturnedItemsCount, $refundReturnedItemsCountSpecified)
  {
    $this->accountType = $accountType;
    $this->currencyCode = $currencyCode;
    $this->chargeAmount = $chargeAmount;
    $this->chargeCount = $chargeCount;
    $this->refundAmount = $refundAmount;
    $this->refundCount = $refundCount;
    $this->voidCount = $voidCount;
    $this->declineCount = $declineCount;
    $this->errorCount = $errorCount;
    $this->returnedItemAmount = $returnedItemAmount;
    $this->returnedItemAmountSpecified = $returnedItemAmountSpecified;
    $this->returnedItemCount = $returnedItemCount;
    $this->returnedItemCountSpecified = $returnedItemCountSpecified;
    $this->chargebackAmount = $chargebackAmount;
    $this->chargebackAmountSpecified = $chargebackAmountSpecified;
    $this->chargebackCount = $chargebackCount;
    $this->chargebackCountSpecified = $chargebackCountSpecified;
    $this->correctionNoticeCount = $correctionNoticeCount;
    $this->correctionNoticeCountSpecified = $correctionNoticeCountSpecified;
    $this->chargeChargeBackAmount = $chargeChargeBackAmount;
    $this->chargeChargeBackAmountSpecified = $chargeChargeBackAmountSpecified;
    $this->chargeChargeBackCount = $chargeChargeBackCount;
    $this->chargeChargeBackCountSpecified = $chargeChargeBackCountSpecified;
    $this->refundChargeBackAmount = $refundChargeBackAmount;
    $this->refundChargeBackAmountSpecified = $refundChargeBackAmountSpecified;
    $this->refundChargeBackCount = $refundChargeBackCount;
    $this->refundChargeBackCountSpecified = $refundChargeBackCountSpecified;
    $this->chargeReturnedItemsAmount = $chargeReturnedItemsAmount;
    $this->chargeReturnedItemsAmountSpecified = $chargeReturnedItemsAmountSpecified;
    $this->chargeReturnedItemsCount = $chargeReturnedItemsCount;
    $this->chargeReturnedItemsCountSpecified = $chargeReturnedItemsCountSpecified;
    $this->refundReturnedItemsAmount = $refundReturnedItemsAmount;
    $this->refundReturnedItemsAmountSpecified = $refundReturnedItemsAmountSpecified;
    $this->refundReturnedItemsCount = $refundReturnedItemsCount;
    $this->refundReturnedItemsCountSpecified = $refundReturnedItemsCountSpecified;
  }

}
