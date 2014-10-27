<?php


/**
 * 
 * @package apiClasses.apiObjects.update
 */
class UpdateSplitTenderGroupResponse
{

  /**
   * 
   * @var UpdateSplitTenderGroupResponseType $UpdateSplitTenderGroupResult
   * @access public
   */
  public $UpdateSplitTenderGroupResult = null;

  /**
   * 
   * @param UpdateSplitTenderGroupResponseType $UpdateSplitTenderGroupResult
   * @access public
   */
  public function __construct($UpdateSplitTenderGroupResult)
  {
    $this->UpdateSplitTenderGroupResult = $UpdateSplitTenderGroupResult;
  }

}
