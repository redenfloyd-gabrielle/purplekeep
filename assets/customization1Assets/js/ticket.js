$('document').ready(function(){
	var tix = [];
	$('#openModal').on('click', function(){
		$('#ticketModal').modal('show');
	});
	$('#addTicket').click(function(){
		var ticket = {tType:'',total:'',price:''};
		$('#ticketForm :input').each(function(){
			switch($(this).attr('name')){
				case 'ticketType': ticket.tType = $(this).val();break;
				case 'no_tickets_total': ticket.total = $(this).val();break;
				case 'price_tickets_total': ticket.price = $(this).val();break;
			}
		});
		$('#ticketModal').modal('hide');
		$('#tixContainer').append("<li class=\"w3-bar\" style=\"border:1px solid #f2f2f2;padding:5px\">" + 
								  "<span id=\"removeTix\" class=\"w3-bar-item w3-button w3-large w3-right\">&times;</span>" +
                                  "<div class=\"w3-bar-item\"><span class=\"w3-medium\"><b>Ticket Type</b></span><br>" +
                                  "<span>" + ticket.tType + "</span></div><div class=\"w3-bar-item\">" +
                                  "<span class=\"w3-medium\"><b>No of Tickets</b></span><br><span>" + ticket.total + "</span>" +
                                  "</div><div class=\"w3-bar-item\"><span class=\"w3-medium\"><b>Price</b></span><br>" +
                                  "<span>Php " + ticket.price +"</span></div></li>");
		tix.push(ticket);
	});
	$('#tixContainer').on('click','#removeTix', function(){
		var item = $(this).parent();
		item.remove();
	});
});