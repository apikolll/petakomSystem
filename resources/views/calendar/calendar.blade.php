@extends('layouts.app')

@section('content')

<div class="container" style="max-width: 70%;">
    <div id='full_calendar_events'></div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var SITEURL = "{{ url('/') }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var calendar = $('#full_calendar_events').fullCalendar({
            editable: true,
            events: SITEURL + "/calendar-event",
            displayEventTime: false,
            editable: true,
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            
            select: function (start, end, allDay) {
                var title = prompt('Activity Name:');
                if (title) {
                    // var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                    // var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: SITEURL + "/calendar-crud-ajax",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            type: 'create'
                        },
                        type: "POST",
                        success: function (data) {
                                displayMessage("Event Created Successfully");

                                calendar.fullCalendar('renderEvent',
                                    {
                                        id: data.id,
                                        title: title,
                                        start: start,
                                        end: end,
                                        allDay: allDay
                                    },true);

                                calendar.fullCalendar('unselect');
                            }
                    });
                }
            },
            eventDrop: function (event, delta) {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                $.ajax({
                    url: SITEURL + '/calendar-crud-ajax',
                    data: {
                        title: event.title,
                        start: start,
                        end: end,
                        id: event.id,
                        type: 'edit'
                    },
                    type: "POST",
                    success: function (response) {
                        displayMessage("Event updated");
                    }
                });
            },
            eventClick: function (event) {
                var eventDelete = confirm("Are you sure?");
                if (eventDelete) {
                    $.ajax({
                        type: "POST",
                        url: SITEURL + '/calendar-crud-ajax',
                        data: {
                            id: event.id,
                            type: 'delete'
                        },
                        success: function (response) {
                            calendar.fullCalendar('removeEvents', event.id);
                            displayMessage("Event removed");
                        }
                    });
                }
            }
        });
    });

    function displayMessage(message) {
        toastr.success(message, 'Event');            
    }

</script>


@endsection