@extends('layouts.app')

@section('content')
    <h3 class="page-title">Bantuan</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['topics.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Nama*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('no', 'No Telepon*', ['class' => 'control-label']) !!}
                    {!! Form::text('no', old('no'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('no'))
                        <p class="help-block">
                            {{ $errors->first('no') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('line', 'Line*', ['class' => 'control-label']) !!}
                    {!! Form::text('line', old('line'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('line'))
                        <p class="help-block">
                            {{ $errors->first('line') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

