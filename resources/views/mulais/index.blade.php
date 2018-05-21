@extends('layouts.app')

@section('content')
                                    {{-- @foreach($time as $time) --}}
    <h3 class="page-title">Atur Waktu</h3> 

    <h3>Waktu Mulai <span style="color:red;font-weight:bold">{{$time->mulai}}  - {{$time->selesai}} </span></h3>


    <div class="panel panel-default">
        <div class="panel-heading">
            Atur waktu
        </div>

        <div class="panel-body">


{{-- @endforeach --}}

{!! Form::model($time, ['url' => '/ganti','method'=>'post', 'class'=>'form-horizontal']) !!}

<div class="form-group{{ $errors->has('mulai') ? ' has-error' : '' }}">
  {!! Form::label('mulai', 'Atur Waktu Mulai', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
        {!! Form::datetimelocal('mulai', null, ['class'=>'form-control']) !!}
        {!! $errors->first('mulai', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('selesai') ? ' has-error' : '' }}">
  {!! Form::label('selesai', 'Atur Waktu Selesai', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-4">
        {!! Form::datetimelocal('selesai', null, ['class'=>'form-control']) !!}
        {!! $errors->first('selesai', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 col-md-offset-2">
        {!! Form::submit('Atur', ['class'=>'btn btn-primary']) !!}
    </div>
</div>
{!! Form::close() !!}
            </table>
        </div>
    </div>

<h3 id="demo"></h3>

<h3 id="d"></h3>


<script>
// Create Countdown

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
    
    // Output the result in an element with id="demo"
    // document.getElementById("d").innerHTML = days;
    // document.getElementById("h").innerHTML = hour;
    // document.getElementById("m").innerHTML = minute;
    // document.getElementById("s").innerHTML = second;
    document.getElementById("demo").innerHTML = day + " day " + hour + ": "
    + minute + ": " + second;
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "MULAI";
    }
}, 1000);

var selesai = {!!json_encode($jo)!!};

// // Update the count down every 1 second
var y = setInterval(function() {

    // Get todays date and time
    {{-- var now = {!!json_encode($jos)!!}; --}}
    var no = new Date().getTime();
    
    // Find the distance between now an the count down date
    var dista = selesai - no;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(dista / (1000 * 60 * 60 * 24));
    var hours = Math.floor((dista % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((dista % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((dista % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
       document.getElementById("d").innerHTML = days + " day " + hours + ": "
    + minutes + ": " + seconds;
    
//     // If the count down is over, write some text 
    if (dista < 0) {
        clearInterval(y);
        document.getElementById("demo").innerHTML = "SELESAI";
    }
}, 1000);
</script>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('roles.mass_destroy') }}';
    </script>
@endsection