@extends('layouts.app')

@section('content')
    <h3 class="page-title">Bantuan</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                      
                                <td>{{ $bantuan->name }}</td>
                                <td>{{ $bantuan->no }}</td>
                                <td>{{ $bantuan->line }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('bantuans.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop