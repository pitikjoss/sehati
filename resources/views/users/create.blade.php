@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['users.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
                        <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sekolah', 'Sekolah*', ['class' => 'control-label']) !!}
                    {!! Form::text('sekolah', old('sekolah'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('sekolah'))
                        <p class="help-block">
                            {{ $errors->first('sekolah') }}
                        </p>
                    @endif
                </div>
            </div>
                        <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('anggota1', 'Anggota 1*', ['class' => 'control-label']) !!}
                    {!! Form::text('anggota1', old('anggota1'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('anggota1'))
                        <p class="help-block">
                            {{ $errors->first('anggota1') }}
                        </p>
                    @endif
                </div>
            </div>
                        <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('anggota2', 'Anggota 2*', ['class' => 'control-label']) !!}
                    {!! Form::text('anggota2', old('anggota2'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('anggota2'))
                        <p class="help-block">
                            {{ $errors->first('anggota2') }}
                        </p>
                    @endif
                </div>
            </div>
                        <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('anggota3', 'Anggota 3*', ['class' => 'control-label']) !!}
                    {!! Form::text('anggota3', old('anggota3'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('anggota3'))
                        <p class="help-block">
                            {{ $errors->first('anggota3') }}
                        </p>
                    @endif
                </div>
            </div>
                        <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('telepon', 'Telepon*', ['class' => 'control-label']) !!}
                    {!! Form::number('telepon', old('telepon'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('telepon'))
                        <p class="help-block">
                            {{ $errors->first('telepon') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('role_id', 'Role*', ['class' => 'control-label']) !!}
                    {!! Form::select('role_id', $roles, old('role_id'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('role_id'))
                        <p class="help-block">
                            {{ $errors->first('role_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

