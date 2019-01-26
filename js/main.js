$(document).ready(function() {
    //Display upcoming events
    formatGoogleCalendar.init({
        calendarUrl: 'https://www.googleapis.com/calendar/v3/calendars/cornell.edu_pqbmmt44ugncli8la7tk55mvnc@group.calendar.google.com/events?key=AIzaSyB3L7-mbNB4ELsSdYcAS9nZYvWnC7LGw3U',
        past: false,
        upcoming: true,
        upcomingHeading: '',
        upcomingTopN: 4, /*Displays 4 upcoming events*/
        format: ['*summary*', '*date*', '*location*'] //Change order in which information is displayed
    });
    
    //Initialize the calendar
   $('#calendar').fullCalendar({
       googleCalendarApiKey: 'AIzaSyB3L7-mbNB4ELsSdYcAS9nZYvWnC7LGw3U',
       events: {
            googleCalendarId: 'cornell.edu_pqbmmt44ugncli8la7tk55mvnc@group.calendar.google.com'
       },
       
       header: {
              left: 'prev,next today',
              center: 'title',
              right: 'month,agendaWeek,agendaDay',
              eventLimit: true
            },
       
       displayEventEnd: true
       
    }); 
});