@extends('layouts.app')

@section('content')
   {{-- @if($date<=$sekarang) --}}
   <h1>Waktu Mulai Test </h1>
<h3 id="d"></h3>

    {!! Form::open(['method' => 'POST', 'route' => ['tests.store'], 'name'=>'myForm', 'id'=>'myForm']) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.quiz')
        </div>
        <?php //dd($questions) ?>
    @if(count($questions) > 0)
    <h3 class="page-title">@lang('quickadmin.laravel-quiz')</h3>
        <div class="panel-body">
        <?php $i = 1; ?>
        @foreach($questions as $question)
            @if ($i > 1) <hr /> @endif
            <div class="row">
                <div class="col-xs-12 form-group">
                    <div class="form-group">
                        <strong>Question {{ $i }}.<br />{!! nl2br($question->question_text) !!}</strong>

                        @if ($question->code_snippet != '')
                            <div class="code_snippet">{!! $question->code_snippet !!}</div>
                        @endif

                        <input
                            type="hidden"
                            name="questions[{{ $i }}]"
                            value="{{ $question->id }}">
                    @foreach($question->options as $option)
                        <br>
                        <label class="radio-inline">
                            <input
                                type="radio"
                                name="answers[{{ $question->id }}]"
                                value="{{ $option->id }}">
                            {{ $option->option }}
                        </label>
                    @endforeach
                    </div>
                </div>
            </div>
        <?php $i++; ?>
        @endforeach
        </div>
    @endif
    </div>

    {!! Form::submit(trans('quickadmin.submit_quiz'), ['class' => 'btn btn-danger', 'id'=>'clickButton']) !!}
    {!! Form::close() !!}
{{--    @else
<h1>Waktu Mulai Test</h1>
<div id="demo"> --}}




</body>
</html>
   {{-- @endif --}}
@stop

@section('javascript')
    @parent
    <script src="{{ url('quickadmin/js') }}/timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
    <script>
var countDownDate = {!!json_encode($jos)!!};

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var day = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hour = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minute = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var second = Math.floor((distance % (1000 * 60)) / 1000);
    

    document.getElementById("demo").innerHTML = days + " day " + hours + ": "
    + minutes + ": " + seconds;
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        window.location.reload(true);
    }
}, 1000);

var selesai = {!!json_encode($jo)!!};

// // Update the count down every 1 second
var y = setInterval(function() {

    // Get todays date and time
    var no = new Date().getTime();
    
    // Find the distance between now an the count down date
    var dista = selesai - no;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(dista / (1000 * 60 * 60 * 24));
    var hours = Math.floor((dista % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((dista % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((dista % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
       document.getElementById("d").innerHTML = minutes + ": " + seconds;
    
//     // If the count down is over, write some text 
    if (dista < 0) {
        clearInterval(y);
        document.getElementById("clickButton").click();
    }
}, 1000);
        $('.datetime').datetimepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}",
            timeFormat: "hh:mm:ss"
        });
        // // Set the date we're counting down to


    </script>
@stop
