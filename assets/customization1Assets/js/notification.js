$('document').ready(function(){
var formData = {
					userfile:"",
					event_name:"",
					event_category:"",
					dateStart:"",
					dateEnd:"",
					event_details:"",
					event_venue:"",
					venue_capacity:"",
					region_code:"",
					municipal_name:""
				};
$.fn.form.settings.rules.validStart = function(value, dateEnd){
	var ret = true;
	var dateTime = moment().format('MM/DD/Y hh:mm A');
	
	ret = (value < dateTime)?false:true;

	ret = (value > dateEnd)?false:true;

	return ret;
}	

$.fn.form.settings.rules.validEnd = function(value, dateStart){
	var ret = true;
	var dateTime = moment().format('MM/DD/Y hh:mm A');
	
	ret = (value < dateTime)?false:true;

	ret = (value < dateStart)?false:true;

	return ret;
}

$('.ui.form')
  .form({
    fields : {
    	eventPicture: {
    		identifier: 'userfile',
    		rules: [
    			{
    				type: 'empty',
    				prompt: 'Please include a picture of your event'
    			}
    		]
    	},
    	eventName: {
    		identifier: 'event_name',
    		rules: [
    			{
    				type: 'empty',
    				prompt: 'Please enter the name of your event'
    			}
    		]
    	},
    	eventCategory: {
    		identifier: 'event_category',
    		rules: [
    			{
    				type: 'empty',
    				prompt: 'Please select a category'
    			}
    		]
    	},
    	dateStart: {
    		identifier: 'dateStart',
    		rules: [
    			{
    				type: 'empty',
    				prompt: 'Please select a start date'
    			}
    		]
    	},
    	dateEnd: {
    		identifier: 'dateEnd',
    		rules: [
    			{
    				type: 'empty',
    				prompt: 'Please select an end date'
    			}
    		]
    	},
    	eventDetails: {
    		identifier: 'event_details',
    		rules: [
    			{
    				type: 'empty',
    				prompt: 'Please enter a description'
    			},
    			{
    				type: 'minLength[5]',
    				prompt: 'Description must be at least 5 characters'
    			}
    		]
    	},
    	eventVenue: {
    		identifier: 'event_venue',
    		rules: [
    			{
    				type: 'empty',
    				prompt: 'Please enter a location'
    			}
    		]
    	},
    	eventCapacity: {
    		identifier: 'venue_capacity',
    		rules: [
    			{
    				type: 'empty',
    				prompt: 'Please enter the venue capacity'
    			}
    		]
    	},
    	eventRegion: {
    		identifier: 'region_code',
    		rules: [
    			{
    				type: 'empty',
    				prompt: 'Please enter region code'
    			}
    		]
    	},
    	eventMunicipal: {
    		identifier: 'municipal-name',
    		rules: [
    			{
    				type: 'empty',
    				prompt: 'Please enter municipality'
    			}
    		]
    	},
    	ticketType: {
    		identifier: 'ticketType',
    		rules: [
    			{
    				type: 'empty',
    				prompt: 'Please enter ticket type'
    			}
    		]
    	},
    	ticketQty: {
    		identifier: 'no_tickets_total',
    		rules: [
    			{
    				type: 'empty',
    				prompt: 'Please enter tickets quantity'
    			}
    		]
    	},
    	ticketPrice: {
    		identifier: 'price_tickets_total',
    		rules: [
    			{
    				type: 'empty',
    				prompt: 'Please enter ticket price'
    			}
    		]
    	}
    },
    inline : true
  })
;
function validateDetails(){
	var ret = true;
	
	if( !$('.ui.form').form('validate field', 'eventPicture')) {
	  ret = false;
	}
	if( !$('.ui.form').form('validate field', 'eventName')) {
	  ret = false;
	}
	if( !$('.ui.form').form('validate field', 'eventCategory')) {
	  ret = false;
	}
	if( !$('.ui.form').form('validate field', 'dateStart')) {
	  ret = false;
	}
	if( !$('.ui.form').form('validate field', 'dateEnd')) {
	  ret = false;
	}
	if( !$('.ui.form').form('validate field', 'eventDetails')) {
	  ret = false;
	}

	return ret;
}
function validateVenue(){
	var ret = true;
	
	if( !$('.ui.form').form('validate field', 'eventVenue')) {
	  ret = false;
	}
	if( !$('.ui.form').form('validate field', 'eventCapacity')) {
	  ret = false;
	}
	if( !$('.ui.form').form('validate field', 'eventRegion')) {
	  ret = false;
	}
	if( !$('.ui.form').form('validate field', 'eventMunicipal')) {
	  ret = false;
	}

	return ret;
}
function validateTicket(){
	var ret = true;

	if( !$('.ui.form').form('validate field', 'ticketType')) {
	  ret = false;
	}
	if( !$('.ui.form').form('validate field', 'ticketQty')) {
	  ret = false;
	}
	if( !$('.ui.form').form('validate field', 'ticketPrice')) {
	  ret = false;
	}

	return ret;
}
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	current_fs = $(this).parent();
	var ndx = current_fs[0].attributes[0].value;
	var flag = false;
	switch(ndx){
		case "1": flag = validateDetails();break;
		case "2": flag = validateVenue();break;
	}
	if(flag){
		if(animating) return false;
		animating = true;
	
		next_fs = $(this).parent().next();
		
		//activate next step on progressbar using the index of next_fs
		$("#formsteps .step").eq($("fieldset").index(next_fs)).addClass("active");
		$("#formsteps .step").eq($("fieldset").index(current_fs)).removeClass("active");
		$("#formsteps .step").eq($("fieldset").index(current_fs)).addClass("completed");
		
		//show the next fieldset
		next_fs.show(); 
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale current_fs down to 80%
				scale = 1 - (1 - now) * 0.2;
				//2. bring next_fs from the right(50%)
				left = (now * 50)+"%";
				//3. increase opacity of next_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({
	        'transform': 'scale('+scale+')',
	        'position': 'absolute'
	      });
				next_fs.css({'left': left, 'opacity': opacity});
			}, 
			duration: 800, 
			complete: function(){
				current_fs.hide();
				animating = false;
			}, 
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
	}
});

//Dynamic ticket list and form submission script
var listLength = 0;
var ticketsArray = [];

$("#msform").submit(function(e){
	e.preventDefault(e);
	allFields = $('#msform').form('get values');
	console.log(allFields);
});

$('#addTix').click(function(){
	var flag = validateTicket();

	if(flag){
		var ticket = {tType:$("input[name=ticketType]").val(),tQuantity:$("input[name=price_tickets_total]").val(),tPrice:$("input[name=no_tickets_total]").val()};
		ticketsArray.push(ticket);
		
		$('#msform').form('reset');
		if(listLength == 0){
			$('#ticketList').html('');
		}

		++listLength;
		$('#ticketList').append('<li class="list-group-item justify-content-between">' +
	  							 	'<b>'+ ticket.tType +'</b>' +
	                                '<span style="background-color:#dc3545;"class="badge badge-danger badge-pill"><a id="removeTix">X</a></span>' +
	                                '<br><small><b>Quantity: </b>'+ ticket.tQuantity +'</small>' +
	                                '<br><small><b>Price: </b>Php '+ ticket.tPrice +'</small>' +
	                             '</li>');
	}
});

$('#ticketList').on('click', '#removeTix', function(){
	var temp = $(this).closest('li').remove();
	--listLength;
	if(listLength == 0){
		$('#ticketList').html('<div style="text-align:center"><br><br><h3><i class="meh outline icon"></i>Ticket list is empty.</h3></div>');
	}
});
});