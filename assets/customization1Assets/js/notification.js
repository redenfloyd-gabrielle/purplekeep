$('document').ready(function(){
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
    		identifier: 'ticketType1',
    		rules: [
    			{
    				type: 'empty',
    				prompt: 'Please enter ticket type'
    			}
    		]
    	},
    	ticketQty: {
    		identifier: 'no_tickets_total1',
    		rules: [
    			{
    				type: 'empty',
    				prompt: 'Please enter tickets quantity'
    			}
    		]
    	},
    	ticketPrice: {
    		identifier: 'price_tickets_total1',
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

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$("#msform").submit(function(e){
	var flag = validateTicket();

	if(!flag){
		e.preventDefault(e);
	}
})
});