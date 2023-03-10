/*FullCalendar Init*/
$(document).ready(function() {
	'use strict';
	var drag =  function() {
        $('.calendar-event').each(function() {
		
		// store data so the calendar knows to render an event upon drop
        $(this).data('event', {
            title: $.trim($(this).find('p').text()), // use the element's text as the event title
            backgroundColor: $(this).css('background-color'), // use the element's background color & border color as the event border color
            borderColor: $(this).css('background-color').replace(')', ', 0.3)').replace('rgb', 'rgba'),
            textColor: $(this).css('color'), // use the element's text color as the event text color
            stick: true // maintain when user navigates (see docs on the renderEvent method)
		});
		
        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex: 1111999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        });
    });
    };
    
    var removeEvent =  function() {
		$(document).on('click','.remove-calendar-event',function(e) {
			$(this).closest('.calendar-event').fadeOut();
        return false;
    });
    };
    $(document).on('click','#add_event',function(e) {
		$('<div class="calendar-event alert alert-'+$( "#event_priority" ).val()+' alert-dismissible fade show"><p>' + $('#inputEvent').val() + '</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>').insertAfter(".calendar-event:last-child").draggable();
		$(this).parents('.modal').find('.close').trigger('click');
		drag();
		return false;
	});
  
    
    
    drag();
    removeEvent();
    
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth();
    var year = date.getFullYear();
	
	$('#calendar').fullCalendar({
	themeSystem: 'bootstrap4',
	  customButtons: {
		calendarSidebar: {
			text: 'icon',
		}
	},
	header: {
	left: 'calendarSidebar ,today',
	center: 'prev,title,next',
	right: 'month,agendaWeek,agendaDay,listMonth'
	},
	droppable: true,	
	editable: true,
	height: 'parent',
	eventLimit: true, // allow "more" link when too many events
	windowResizeDelay:500,
	events: [{
				title: 'Conference',
				start: '2019-12-25',
				backgroundColor: 'rgb(188, 231, 199)',
                borderColor: 'rgba(188, 231, 199, 0.3)',
				textColor: '#05592b'
			},
			{
				title: 'Long Event',
				start: '2019-12-07',
				end: '2019-12-10',
				backgroundColor: 'rgb(253, 197, 195)',
                borderColor: 'rgba(253, 197, 195, 0.3)',
				textColor: '#8b0c12'
            },
			{
				title: 'Meetings',
				start: '2019-12-27',
				backgroundColor: 'rgb(178, 230, 250)',
                borderColor: 'rgba(178, 230, 250, 0.3)',
			    textColor: '#075875'
			},
			{
				title: 'Sports',
				start: '2019-12-01',
				backgroundColor: 'rgb(253, 197, 195)',
                borderColor: 'rgba(253, 197, 195, 0.3)',
			    textColor: '#8b0c12'
			},
			{
				title: 'Party',
				start: '2019-12-22',
				backgroundColor: 'rgb(253, 197, 195)',
                borderColor: 'rgba(253, 197, 195, 0.3)',
			    textColor: '#8b0c12'
			},
			{
				title: 'Travel',
				start: '2019-12-10',
				backgroundColor: 'rgb(253, 197, 195)',
                borderColor: 'rgba(253, 197, 195, 0.3)',
			    textColor: '#8b0c12'
			},
			{
				title: 'Conference',
				start: '2019-12-25',
				backgroundColor: 'rgb(253, 197, 195)',
                borderColor: 'rgba(253, 197, 195, 0.3)',
			    textColor: '#8b0c12'
			},
			{
              title: 'Long Event',
              start: '2019-12-07',
              end: '2019-12-11',
			  backgroundColor: 'rgb(253, 197, 195)',
                borderColor: 'rgba(253, 197, 195, 0.3)',
			    textColor: '#8b0c12'
            },
			{
              id: 999,
              title: 'Repeating Event',
              start: '2019-12-09',
			  backgroundColor: 'rgb(188, 231, 199)',
              borderColor: 'rgba(188, 231, 199, 0.3)',
			  textColor: '#05592b'
            }
		],
		drop: function() {
			//alert($(this).css('background-color'));
			if($("#remove_event").is(':checked'))
				$(this).remove();
		}
	});
	setTimeout(function(){
		$('.fc-left .fc-calendarSidebar-button').attr("id","calendarapp_sidebar_move").html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>');
		$('.fc-left .fc-today-button').removeClass('btn-primary').addClass('btn-outline-secondary btn-sm');
		$('.fc-center .btn').removeClass('btn-primary').addClass('btn-outline-light btn-sm');
		$('.fc-right .btn-group').addClass('btn-group-sm');
		$('.fc-right .btn').removeClass('btn-primary').addClass('btn-outline-secondary');
	},100);
	
});