@extends('layouts.app')

@section('content')
    {{-- <h3 class="page-title">@lang('quickadmin.users.title')</h3> --}}
    
    <div class="panel panel-default">
        <div class="panel-heading">
            PERATURAN
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                            @foreach($peraturan as $peraturan)
                        <tr><th>{{ $peraturan->id }}</th>
                    <td>{{ $peraturan->peraturan }}</td></tr>{{-- <tr><th>{{ $peraturan->id }}</th> --}}
                    {{-- <td>{{ $peraturan->peraturan }}</td></tr><tr><th>@lang('quickadmin.users.fields.email')</th> --}}
                            @endforeach
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            {{-- <a href="{{ route('users.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a> --}}
        </div>
    </div>
@stop