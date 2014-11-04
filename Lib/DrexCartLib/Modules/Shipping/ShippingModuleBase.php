<?php

abstract class ShippingModuleBase {
	
	abstract function __construct(DrexCartShoppingCart $cart);
	abstract function getShippingCosts($optionCode);
	
	abstract function getShippingMethodName();
	
	abstract function getShippingOptions();
	
}