function loadOrderDetails(orderId, userId) {
	
	$.ajax('/DrexCartUsers/orderDetails/'+orderId,
		   {success: function (data) {
			   
			   $('.modal').modal('show');
			   $('.modal-title').html('Order Details');
			   $('.modal-body').html(data);
		   		},
		   	error: function () {
		   		
		   		}
		   	});
}

function loadAddressDetails($addressId) {
	$.ajax('/DrexCartUsers/addressesEdit/'+$addressId,
			   {success: function (data) {
				   
				   $('.modal').modal('show');

				   $('.modal-title').html('Update Address');
				   $('.modal-body').html(data);
			   		},
			   	error: function () {
			   		
			   		}
			   	});
}