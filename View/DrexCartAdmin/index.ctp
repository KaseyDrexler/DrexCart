<h1>Admin Dashboard</h1>

<?php 
if (sizeof($gateways)==0) {
	?>
	<div class="alert alert-warning">No payment gateways configured!</div>
	<?php 
}

?>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<p class="panel-title">Order Summary
				<?php echo $this->Html->link('View All', '/DrexCartAdmin/orders/', array('class'=>'pull-right btn btn-link')); ?>
				</p>
			</div>
			<div class="panel-body">
				<p><b>Number of Orders:</b> <?php echo $order_summary['num_orders']; ?></p>
				<p><b>Total Revenue:</b> $<?php echo number_format($order_summary['totals'],2); ?></p>
				<div id="saleschart" class="chart" style="height:150px;">
					
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<p class="panel-title">Users Summary 
				<?php echo $this->Html->link('View All', '/DrexCartAdmin/customers/', array('class'=>'pull-right btn btn-link')); ?>
				</p>
				
			</div>
			<div class="panel-body">
				<p><b>Number of Users:</b> <?php echo $num_users; ?></p>
				<div id="userschart" class="chart" style="height:150px;">
					
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<p class="panel-title">Product Stats</p>
			</div>
			<div class="panel-body" id="panel_product_stats">
				
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<p class="panel-title"></p>
			</div>
			<div class="panel-body">
				
			</div>
		</div>
	</div>
</div>		

<?php echo $this->Html->script('DrexCart.plugin/flot/jquery.flot.cust.js'); ?>
<?php echo $this->Html->script('DrexCart.plugin/flot/jquery.flot.resize.js'); ?>
<?php echo $this->Html->script('DrexCart.plugin/flot/jquery.flot.fillbetween.min.js'); ?>
<?php echo $this->Html->script('DrexCart.plugin/flot/jquery.flot.orderBar.js'); ?>
<?php echo $this->Html->script('DrexCart.plugin/flot/jquery.flot.pie.js'); ?>
<?php echo $this->Html->script('DrexCart.plugin/flot/jquery.flot.tooltip.js'); ?>



<script type="text/javascript">




$(document).ready(function () {


	<?php echo $this->Js->request('/DrexCartAdmin/productStats/', array('buffer'=>false, 'async'=>false, 'update'=>'#panel_product_stats')); ?>
	

	
	/* chart colors default */
	var $chrt_border_color = "#efefef";
	var $chrt_grid_color = "#DDD"
	var $chrt_main = "#E24913";
	/* red       */
	var $chrt_second = "#6595b4";
	/* blue      */
	var $chrt_third = "#FF9F01";
	/* orange    */
	var $chrt_fourth = "#7e9d3a";
	/* green     */
	var $chrt_fifth = "#BD362F";
	/* dark red  */
	var $chrt_mono = "#000";

	
	if ($("#saleschart").length) {
		<?php //pr($order_totals); 
		$data = array();
		
		for($days_back = 7; $days_back>=0; $days_back--) {
			$data[(strtotime(date('Y-m-d', time()))-86400*$days_back).'000'] = 0;
		}
		foreach($order_totals[0] as $ot) {
			$data[(strtotime($ot['thedate'])).'000'] += $ot['amount'];
		}
		
		?>
		var d = [<?php 
		 		foreach($data as $tmpname=>$tmpvalue) {
					echo '['.$tmpname.', '.$tmpvalue.'], ';
				}
		 		?>];

		for (var i = 0; i < d.length; ++i)
			d[i][0] += 60 * 60 * 1000;

		function weekendAreas(axes) {
			var markings = [];
			var d = new Date(axes.xaxis.min);
			// go to the first Saturday
			d.setUTCDate(d.getUTCDate() - ((d.getUTCDay() + 1) % 7))
			d.setUTCSeconds(0);
			d.setUTCMinutes(0);
			d.setUTCHours(0);
			var i = d.getTime();
			do {
				// when we don't set yaxis, the rectangle automatically
				// extends to infinity upwards and downwards
				markings.push({
					xaxis : {
						from : i,
						to : i + 2 * 24 * 60 * 60 * 1000
					}
				});
				i += 7 * 24 * 60 * 60 * 1000;
			} while (i < axes.xaxis.max);

			return markings;
		}

		var options = {
			xaxis : {
				mode : "time",
				tickLength : 5
			},
			series : {
				lines : {
					show : true,
					lineWidth : 1,
					fill : true,
					fillColor : {
						colors : [{
							opacity : 0.1
						}, {
							opacity : 0.15
						}]
					}
				},
				//points: { show: true },
				shadowSize : 0
			},
			selection : {
				mode : "x"
			},
			grid : {
				hoverable : true,
				clickable : true,
				tickColor : $chrt_border_color,
				borderWidth : 0,
				borderColor : $chrt_border_color,
			},
			tooltip : true,
			tooltipOpts : {
				content : "Your sales for <b>%x</b> was <b>$%y</b>",
				dateFormat : "%0m/%0d/%y",
				defaultTheme : false
			},
			colors : [$chrt_second],

		};

		var plot = $.plot($("#saleschart"), [d], options);
	};

	// user chart
	if ($("#userschart").length) {
		<?php //pr($order_totals); 
		$data = array();
		
		for($days_back = 7; $days_back>=0; $days_back--) {
			$data[(strtotime(date('Y-m-d', time()))-86400*$days_back).'000'] = 0;
		}
		foreach($user_counts[0] as $uc) {
			$data[(strtotime($uc['thedate'])).'000'] += $uc['thecount'];
		}
		
		?>
		var d = [<?php 
		 		foreach($data as $tmpname=>$tmpvalue) {
					echo '['.$tmpname.', '.$tmpvalue.'], ';
				}
		 		?>];

		for (var i = 0; i < d.length; ++i)
			d[i][0] += 60 * 60 * 1000;

		function weekendAreas(axes) {
			var markings = [];
			var d = new Date(axes.xaxis.min);
			// go to the first Saturday
			d.setUTCDate(d.getUTCDate() - ((d.getUTCDay() + 1) % 7))
			d.setUTCSeconds(0);
			d.setUTCMinutes(0);
			d.setUTCHours(0);
			var i = d.getTime();
			do {
				// when we don't set yaxis, the rectangle automatically
				// extends to infinity upwards and downwards
				markings.push({
					xaxis : {
						from : i,
						to : i + 2 * 24 * 60 * 60 * 1000
					}
				});
				i += 7 * 24 * 60 * 60 * 1000;
			} while (i < axes.xaxis.max);

			return markings;
		}

		var options = {
			xaxis : {
				mode : "time",
				tickLength : 5
			},
			series : {
				lines : {
					show : true,
					lineWidth : 1,
					fill : true,
					fillColor : {
						colors : [{
							opacity : 0.1
						}, {
							opacity : 0.15
						}]
					}
				},
				//points: { show: true },
				shadowSize : 0
			},
			selection : {
				mode : "x"
			},
			grid : {
				hoverable : true,
				clickable : true,
				tickColor : $chrt_border_color,
				borderWidth : 0,
				borderColor : $chrt_border_color,
			},
			tooltip : true,
			tooltipOpts : {
				content : "<b><span>%y</span></b> New Users on <b>%x</b>",
				dateFormat : "%0m/%0d/%y",
				defaultTheme : false
			},
			colors : [$chrt_second],

		};

		var plot = $.plot($("#userschart"), [d], options);
	};
});

</script>
