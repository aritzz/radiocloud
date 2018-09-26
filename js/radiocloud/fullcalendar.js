
$(document).ready(function() {



    // blokeen drag&drop delakoa
    // -----------------------------------------------------------------
    $('#rc-external-events .fc-event').each(function() {
        
        $(this).data('event', {
            title: $.trim($(this).text()),
            stick: true, 
            className: $(this).data('class')
            
        });

        $(this).draggable({
            zIndex: 99999,
            revert: true, 
            revertDuration: 0 
        });
    });

    var lasteventid = 0;


    // Parrilaren egutegia
    // -----------------------------------------------------------------
    $('#rc-calendar').fullCalendar({
	    defaultView: 'agendaWeek',
        header: {
            left: '',
            center: '',
            right: ''
        },
        views: {
            agendaWeek: { // name of view
                titleFormat: 'YYYY'
                // other view-specific options here
            }
        },
        columnFormat: {
                month: 'dddd',    // Monday, Wednesday, etc
                week: 'dddd', // Monday 9/7
                day: 'dddd, MMM dS'  // Monday 9/7
            },


        slotEventOverlap: false,
        eventOverlap: function(stillEvent, movingEvent) {
            return stillEvent.allDay && movingEvent.allDay;
        },
    	lang: "eu",
        slotDuration: "00:15:00",
    	allDaySlot: false,
        editable: true,
        droppable: true, 
        drop: function(date, jsEvent, ui, resourceId) {
            $.ajax({
                method: "POST",
                url: "?m=radiocore&c=egutegia&AJAX_REQUEST=1",
                data: { req: "add_event", block: $(this).data("blockname"), date: date.format(), calendarID: $('#rc-calendar').attr('data-calendarid') },
                context: this
            })
            .done(function( msg ) {
                $('#rc-calendar').fullCalendar('removeEvents');
                $('#rc-calendar').fullCalendar('removeEventSources');
                $('#rc-calendar').fullCalendar('addEventSource', sources_calendar);
            });
        },
        
        eventDrop: function(event, delta, revertFunc) {  
            $.ajax({
                method: "POST",
                url: "?m=radiocore&c=egutegia&AJAX_REQUEST=1",
                data: { req: "update_event", id: event.id, date: event.start.format(), calendarID: $('#rc-calendar').attr('data-calendarid')  }
            })
            .done(function( msg ) {
            });
    },
    // Atazak ezabatzeko
	eventRender: function(event, element, view) {
        element.find(".fc-content").append("<span class='closeon'>X</span>");
        element.find(".closeon").on('click', function() {
            $('#rc-calendar').fullCalendar('removeEvents',event._id);
             $.ajax({
                        method: "POST",
                        url: "?m=radiocore&c=egutegia&AJAX_REQUEST=1",
                        data: { req: "trash", id: event._id }
                    });
            });
    },

    selectable: true,
    selectHelper: true,
    select: function(start, end) {
       // return;
    },
    eventLimit: true,
    eventSources: [
    {
        url: 'index.php?m=radiocore&c=egutegia&AJAX_REQUEST=1',
        type: 'POST',
        data: {
            req: 'get_events'
        },
        error: function() {
            alert('Egutegia jasotzean akatsen bat egon da!');
        }

    }
    ]
});

});

