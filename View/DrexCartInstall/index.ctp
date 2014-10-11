<h1>DrexCart v0.0.1 Installer</h1>

<div class="row">
	<div class="col-md-6">Step 1</div>
	<div class="col-md-6" id="panel_step1">
		<?php echo $this->Js->link('Install Database', 
								  '/DrexCartInstall/runStep1/1', 
								  array('update'=>'#panel_step1',
									    'complete'=>$this->Js->request('/DrexCartInstall/runStep2', array('update'=>'#panel_step2', 'buffer'=>false, 'async'=>false)),
									    'class'=>'btn btn-warning',
									    'buffer'=>false)); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-6">Step 2</div>
	<div class="col-md-6" id="panel_step2" style="border:1px solid black;">
	</div>
</div>
<div class="row">
	<div class="col-md-6">Step 3</div>
	<div class="col-md-6"></div>
</div>
<div class="row">
	<div class="col-md-6">Step 4</div>
	<div class="col-md-6"></div>
</div>
<div class="row">
	<div class="col-md-6">Step 5</div>
	<div class="col-md-6"></div>
</div>
<div class="row">
	<div class="col-md-6">Step 6</div>
	<div class="col-md-6"></div>
</div>