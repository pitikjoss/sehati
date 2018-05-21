@extends('layouts.app')

@section('content')
    {{-- <h3 class="page-title">@lang('quickadmin.users.title')</h3> --}}
    
    <div class="panel panel-default">
        <div class="panel-heading">
            Kontak Yang Dapat Dihubungi Untuk Bantuan
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                    @foreach($bantuan as $bantuan)
                        <tr><th>Nama</th>
                    <td>{{ $bantuan->name }}</td></tr>
                    <tr><th>No Telepon</th><td>{{ $bantuan->no }}</td></tr>
                    <tr><th>Line</th><td>{{ $bantuan->line }}</td></tr>   
                    @endforeach
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

        </div>
            
    </div>
@stop