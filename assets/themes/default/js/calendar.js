
	$(document).ready(function() {

        

$('.iziModal').iziModal({
     arrowKeys: true,
         navigateCaption: true,
         navigateArrows: true,
}
);

        
	    var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		/*  className colors
		
		className: default(transparent), important(red), chill(pink), success(green), info(blue)
		
		*/		
		
		  
		/* initialize the external events
		-----------------------------------------------------------------*/
	
		$('#external-events div.external-event').each(function() {
		
			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};
			
			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);
			
			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});
			
        });
        

          $.ajax({
              url: base_url + 'Calendar/loadCalendarEvents',
              type: 'POST',
              data: {
                 
              },
              dataType: 'json',
              success: function (data) {
              
         
    var events=new Array();
    
    data.results.forEach(element => {
        
var event={
    	id: element.id,
            title: element.title,
             description: element.description,
             text: element.text,
               link: element.link,
                 link_display: element.link_display,
             image:base_url+'/backend/'+element.image,
    	    start: new Date(element.date),
    	    allDay: false,
}

events.push(event);
        
    });
	
		/* initialize the calendar
		-----------------------------------------------------------------*/
		
		var calendar =  $('#calendar').fullCalendar({
			header: {
				left: 'title',
				center: 'agendaDay,agendaWeek,month',
				right: 'prev,next today'
			},
			editable: false,
			firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
			selectable: true,
			 views: {
				listDay: { buttonText: 'list day' },
				listWeek: { buttonText: 'list week' }
			},
			defaultView: 'month',
			
			axisFormat: 'h:mm',
			columnFormat: {
                month: 'ddd',    // Mon
                week: 'ddd d', // Mon 7
                day: 'dddd M/d',  // Monday 9/7
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMMM yyyy', // September 2009
                week: "MMMM yyyy", // September 2009
                day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
            },
            eventRender: function (event, element) {
                $(element).tooltip({
                    title: event.description
                });
            },
			allDaySlot: false,
			selectHelper: true,
			select: function(start, end, allDay) {
				// var title = prompt('Event Title:');
				// if (title) {
				// 	calendar.fullCalendar('renderEvent',
				// 		{
				// 			title: title,
				// 			start: start,
				// 			end: end,
				// 			allDay: allDay
				// 		},
				// 		true // make the event "stick"
				// 	);
				// }
				// calendar.fullCalendar('unselect');
            },
            eventClick: function (data, event, view) {
               event.preventDefault();
               $('#modal-default-'+data.id).iziModal('open');
            },
			droppable: true, // this allows things to be dropped onto the calendar !!!
			drop: function(date, allDay) { // this function is called when something is dropped
			
				// retrieve the dropped element's stored Event Object
				var originalEventObject = $(this).data('eventObject');
				
				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);
				
				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.allDay = allDay;
				
				// render the event on the calendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
				$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
				
				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}
				
			}, navLinks: true,
			
            events: events,
             dayClick: function (date, jsEvent, view) {
              
               
                     $('#calendar').fullCalendar('changeView', 'agendaDay');
                     $('#calendar').fullCalendar('gotoDate', date);
                 
             },
		});
		
		     }
		     });
	});