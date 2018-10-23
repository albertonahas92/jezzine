var typeFilter=-1;  
  var events = new Array();
 var date = new Date();
   var d = date.getDate();
   var m = date.getMonth();
   var y = date.getFullYear();
 var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
 // Days Names
 var daysArr = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FR', 'SAT'];

	$(document).ready(function() {

        

$('.iziModal').iziModal({
     arrowKeys: true,
         navigateCaption: true,
         navigateArrows: true,
}
);

        
	 
		
 

          $.ajax({
              url: base_url + 'Calendar/loadCalendarEvents',
              type: 'POST',
              data: {
                 
              },
              dataType: 'json',
              success: function (data) {
             
   
    
    data.results.forEach(element => {
        
var event={
    	id: element.id,
            title: element.title,
			 description: element.description,
			 type:element.type,
             text: element.text,
               link: element.link,
                 link_display: element.link_display,
			  image:base_url+'/backend/'+element.image,
			//  image:'http://localhost/backend/' + element.image,
    	    start: new Date(element.date),
    	    allDay: false,
}

events.push(event);
        
    });
	
		/* initialize the calendar
		-----------------------------------------------------------------*/
	
	
            initCalendar();
		
		     }
		     });
	});




	function initCalendar(){

		// current date
		$('.cal-filter li.clickable').click(function () {

if ($(this).hasClass("active")) return;

var value=$(this).data("value");
if(value=="tours")typeFilter=0;
if (value == "packages") typeFilter = 1;
if (value == "events") typeFilter = 2;
if (value == "all") typeFilter = -1;

$('.cal-filter li').removeClass("active");
$(this).addClass("active");
// do filter here
initCalendar();
		});


var calendar = $('.mycalendar');
calendar.html(' ');

// months list
var $monthslist = $('<ul>', {	
	"class": "months",
});

// days list
var $daysList = $('<ul>', {
	"class": "days wow fadeIn",
});



  var mindex=0;


  //  fill monthes 
months.forEach(element => {
	if(mindex>=m){
var classe="";
	if (mindex == m) classe="active";
	var $month = $('<li>', {
		id: mindex,
		"class": "month "+classe,
		"data-month": mindex,
		text: element,
		
	}).appendTo($monthslist);
	$month.click(function(){

		selectMonth(this);
	});
}
mindex++;
});
 $(calendar).append($monthslist);
  $(calendar).append($daysList);

initDays(m);

	}


	function selectMonth($month) {
		if ($($month).hasClass("active")) return;

		$('.month').removeClass("active");
		$($month).addClass("active");

		initDays($($month).attr("data-month"));
	}


	function initDays(month){

		var $daysList = $('.days');
 $daysList.html("");

  var da = new Date(y, month + 1, 0);
  var days= da.getDate();
var startDay=1;
if(m==month)startDay=d
  for(var i=startDay;i<=days;i++){

var thisDate=new Date(y,month,i,0,0,0,0);

	  var resultEventData = events.filter(function (e) {
		  var hitDates = e.start || {};
		   
	  var date = new Date(hitDates);
	
	  return date.getDate() == thisDate.getDate() && date.getMonth() == thisDate.getMonth() && date.getFullYear() == thisDate.getFullYear() && (typeFilter == -1 || e.type == typeFilter);
	  });



		var classe = "";
		if (resultEventData.length>0){
classe += "evented";
		}
		if (i == startDay) classe += "active";
		var $day = $('<li>', {
			"data-date":thisDate,
			"class": "day " + classe,
			"data-day": thisDate.getDate(),
			"data-text": daysArr[thisDate.getDay()],
			

		}).appendTo($daysList);

var $dayNum = $('<div>', {

	"class": "day-num",
	text: thisDate.getDate(),

}).appendTo($day);

var $dayTxt = $('<div>', {

	"class": "day-text",
	text: daysArr[thisDate.getDay()],

}).appendTo($day);

if(i==d){

	initEvents(thisDate);
}

		$day.click(function () {

			selectDay(this);


		

		});
	}

  

	}

	function selectDay($day) {


		if ($($day).hasClass("active")) return;

		$('.day').removeClass("active");
		$($day).addClass("active");

		initEvents(new Date($($day).attr("data-date")));

	}

	function initEvents(day,append=false,count=0){

		if(!append)
 $('.cal-events').html("");

var active = (append==true) ? "" : "active";
 var $event=$('<div>',{

	"class": "mycalendar-event  " + active+" day-cell grid-item ",

"data-date":day
	
}).appendTo($('.cal-events'));

$event.click(function(){

	selectDay($('.day[data-date="' + $(this).data("date") + '"]'));
})

var $dayNum = $('<div>', {

	"class": "day-num",
	text: daysArr[day.getDay()] ,

}).appendTo($event);

var $dayTxt = $('<div>', {

	"class": "day-text",
	text: day.getDate() + " "+$('.months .active').html(),

}).appendTo($event);

count++;

	var resultEventData = events.filter(function (e) {
		var hitDates = e.start || {};

		var date = new Date(hitDates);

		return date.getDate() == day.getDate() && date.getMonth() == day.getMonth() && date.getFullYear() == day.getFullYear() && (typeFilter == -1 || e.type == typeFilter);
	});

resultEventData.forEach(element => {

var $event=$('<div>',{

	"class": "mycalendar-event grid-item",
	"data-id":element.id,
	"style": "background-image:url('" + element.image+"')"
	
}).appendTo($('.cal-events'));

var $eventTitle = $('<p>', {

	"class": "mycalendar-event-desc type-"+element.type,
	text: getEventType(element.type)

}).appendTo($event);

var $eventTitle = $('<h5>', {

	"class": "mycalendar-event-title",
	
	text: element.title

}).appendTo($event);



count++;

$($event).click(function(event){

		event.preventDefault();
		$('#modal-default-' + $(this).attr("data-id")).iziModal('open');
	});



});

if(count<9 && append==false ){

	var nextday = new Date(day.getFullYear(), day.getMonth(), day.getDate() + 1);
	if(nextday.getMonth()!=day.getMonth())return;
	 initEvents(nextday, true, count);
}

	}


	function getEventType(type){
type=parseInt(type) || 0;
		switch(type){

			case 0:return "Tour";break;
				case 1:
					return "Package";
					break;
						case 2:return "Event";break;
		}

	}