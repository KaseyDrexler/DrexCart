function loadOrderDetails(orderId, userId) {
	
	$.ajax('/DrexCartUsers/orderDetails/'+orderId,
		   {success: function (data) {
			   
			   $('.modal').modal('show');
			   $('.modal-body').html(data);
		   		},
		   	error: function () {
		   		
		   		}
		   	});
}