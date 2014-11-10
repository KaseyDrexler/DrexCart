function loadOrderDetails(orderId, userId) {
	
	$.ajax('/DrexCartUsers/orderDetails/'+orderId,
		   {success: function (data) {
			   
			   $('#modal-lg').modal('show');
			   $('#modal-title-lg').html('Order Details');
			   $('#modal-body-lg').html(data);
		   		},
		   	error: function () {
		   		
		   		}
		   	});
}

function loadAddressDetails(addressId) {
	$.ajax('/DrexCartUsers/addressesEdit/'+addressId,
			   {success: function (data) {
				   
				   $('#modal-md').modal('show');

				   $('#modal-title-md').html('Update Address');
				   $('#modal-body-md').html(data);
			   		},
			   	error: function () {
			   		
			   		}
			   	});
}