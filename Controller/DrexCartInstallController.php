<?php

App::Uses('DrexCartInstaller', 'DrexCart.DrexCartLib');
class DrexCartInstallController extends DrexCartAppController {
	var $uses = array('DrexCart.DrexCartConfig');
	
	
	
	public function index() {
		
	}
	
	public function runStep1($run=0) {
		if ($run) {
			$installer = new DrexCartInstaller();
			if ($installer->runStep1()) {
				$this->set('ran', true);
			}
		}
	}
	
	public function runStep2($run=0) {
		$installer = new DrexCartInstaller();
		if (!empty($this->request->data)) {
			//print_r($this->request->data);
			if (isset($this->request->data['DrexCartConfig']['sitename'])) {
				$installer->runStep2($this->request->data['DrexCartConfig']['sitename']);
			}
		}
		try {
			
			
			$sitename = $this->DrexCartConfig->getValue('sitename');
			$this->request->data['DrexCartConfig']['sitename'] = $sitename;
		} catch (Exception $e) {
			echo 'Error:' .$e->getMessage();
		}
	}
}