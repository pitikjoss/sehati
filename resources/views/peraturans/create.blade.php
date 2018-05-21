@extends('layouts.app')

@section('content')
    <h3 class="page-peraturan">Peraturan</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['topics.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('peraturan', 'Peraturan*', ['class' => 'control-label']) !!}
                    {!! Form::text('peraturan', old('peraturan'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('peraturan'))
                        <p class="help-block">
                            {{ $errors->first('peraturan') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

