$(document).ready(function() {
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
            },
        defaultDate: document.getElementById("default_date").value,
        navLinks: true,
        editable: true,
        eventLimit: true,
        events: JSON.parse(document.getElementById("news_events").value),
        });	
});