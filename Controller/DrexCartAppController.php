<?php


App::uses('DrexCartInstaller', 'DrexCart.DrexCartLib');

class DrexCartAppController extends AppController {
	
	public $components = array('RequestHandler', 'Email', 'Session');
	public $helpers = array(
			'Form',
			'Html',
			'Js' => array('Jquery')
	);
	
	public function beforeFilter() {
		parent::beforeFilter();
		
		// check for installed
		$installer = new DrexCartInstaller();
		if ($installer->isInstalled()) {
			// software is considered installed
			
		} else {
			// software is not considered installed
			if (strtolower($this->params['controller'])!='drexcartinstall') {
				$this->redirect('/DrexCartInstall/index');
			}
		}
	}
	
	
}