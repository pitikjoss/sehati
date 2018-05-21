@extends('layouts.app')

@section('content')
    <h3 class="page-title">Bantuan</h3>

    <p>
        <a href="{{ route('bantuans.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($bantuans) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"></th>
                        <th>Nama</th>
                        <th>No Telepon</th>
                        <th>Line</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($bantuans) > 0)
                        @foreach ($bantuans as $bantuan)
                            <tr data-entry-id="{{ $bantuan->id }}">
                                <td></td>
                                <td>{{ $bantuan->name }}</td>
                                <td>{{ $bantuan->no }}</td>
                                <td>{{ $bantuan->line }}</td>
                                <td>
                                    <a href="{{ route('bantuans.show',[$bantuan->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    <a href="{{ route('bantuans.edit',[$bantuan->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['bantuans.destroy', $bantuan->id])) !!}
                                    {!! Form::submit(trans('quickadmin.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
@endsection