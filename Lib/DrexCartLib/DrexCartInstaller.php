<?php


class DrexCartInstaller {
	
	public function isInstalled() {
		try {
			$this->DrexCartConfig = ClassRegistry::init('DrexCart.DrexCartConfig');
			$this->DrexCartConfig->create();
			return true;
		} catch (Exception $e) {
			//echo $e->getMessage();
			return false;
		}
	}
	
	public function runStep1() {
		$this->DrexCartConfig = ClassRegistry::init('DrexCart.DrexCartConfig');
		//$this->DrexCartConfig->create();
		try {
			$this->DrexCartConfig->query("CREATE TABLE IF NOT EXISTS `findy2_drexcart`.`drex_cart_config` (
					  `id` INT NOT NULL AUTO_INCREMENT,
					  `config_code` VARCHAR(45) NOT NULL,
					  `config_value` VARCHAR(45) NOT NULL,
					  `config_value_type` ENUM('string', 'int', 'boolean') NOT NULL,
					  PRIMARY KEY (`id`))
					ENGINE = InnoDB");
			return true;
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}
	}
	
	public function runStep2($sitename='DrexCart') {
		$this->DrexCartConfig = ClassRegistry::init('DrexCart.DrexCartConfig');
		$this->DrexCartConfig->create();
		$this->DrexCartConfig->deleteAll(array('config_code'=>'sitename'));
		$this->DrexCartConfig->id = null;
		$this->DrexCartConfig->save(array('DrexCartConfig'=>array('config_code'=>'sitename',
																  'config_value'=>$sitename,
																  'config_value_type'=>'string')));
		//echo 'step2 ran';
	}
	
}