@extends('vendor.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="py-3 mb-4"><span class="text-muted fw-light">vendor/</span>
        {{ Request::segment(2) . '/' . Request::segment(3) }}

    </h6>

    <div class="row">
        <div class="col-md-12">
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                    #322 - 4 Pax Room Dulux Room
                  </button>
                  <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                    #321 - 4 Pax Dulux Room
                  </button>
                </div>
                <div class="tab-content" id="v-pills-tabContent" style="width:100%">
                  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="calendar"></div>
                        </div>
                    </div>
                    
                  </div>
                  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="calendar1"></div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>


</div>

@endsection

@section('js')
<script>
    $(document).ready(function() {
  ShowCalendar();
});

var events = [];
var calendarEl = document.getElementById('calendar');
var calendarEl1 = document.getElementById('calendar1');
var calendar = new FullCalendar.Calendar(calendarEl, {

    initialView: 'dayGridMonth',

    events: function(info, successCallback, failureCallback ) {
      successCallback(events);
    },

  });
var calendar1 = new FullCalendar.Calendar(calendarEl1, {

    initialView: 'dayGridMonth',

    events: function(info, successCallback, failureCallback ) {
      successCallback(events);
    },

  });

function ShowCalendar() {
  calendar.render();
  calendar1.render();
}

$("#addEvent").on("click", function() {
  events.push({
    title: $("#eventName").val(),
    start: $("#fromDate").val(),
    end: $("#toDate").val()
  });

  calendar.refetchEvents();
});
</script>
@endsection