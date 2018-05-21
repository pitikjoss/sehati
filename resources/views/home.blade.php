@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome! {{Auth::user()->name}}</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <h1>{{Auth::user()->anggota1}}</h1>
                            questions in our database
                        </div>
                        <div class="col-md-3 text-center">
                            <h1>{{Auth::user()->anggota2}}</h1>
                            users registered
                        </div>
                        <div class="col-md-3 text-center">
                            <h1>{{Auth::user()->anggota3}}</h1>
                            quizzes taken
                        </div>
{{--                         <div class="col-md-3 text-center">
                            <h1>{{ number_format($average, 2) }} / 10</h1>
                            average score
                        </div> --}}
                    </div>
                </div>
            </div>
            @if(isset($tes))
            <h1>Terimakasih</h1>
            @else
            @if($date<=$sekarang)
            <a href="{{ route('tests.index') }}" class="btn btn-success">Take a new quiz!</a>
            @else
            <h1 id="demo"></h1>
            @endif
            @endif
        </div>
    </div>
@endsection
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
    

    document.getElementById("demo").innerHTML = day + " day " + hour + ": "
    + minute + ": " + second;
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        window.location.href = "/tests"
    }
}, 1000);
    </script>

