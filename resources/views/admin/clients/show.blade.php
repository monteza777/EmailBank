@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.clients.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.clients.fields.client_name')</th>
                            <td field-key='title'>{{ $clients->client_name }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#users" aria-controls="users" role="tab" data-toggle="tab">Client</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="users">
<table class="table table-bordered table-striped {{ count($clients) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.compids.fields.compid_name')</th>
            <th>@lang('quickadmin.qa_action')</th>

        </tr>
    </thead>

    <tbody>
        @if (count($clients) > 0)
            @foreach ($clients->compids as $compid)
                <tr data-entry-id="{{ $compid->id }}">
                    <td field-key='email'>{{ $compid->compid_name }}</td>
                    <td>
                        @can('user_view')
                        <a href="{{ route('admin.compids.show',[$compid->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                        @endcan
                        @can('user_edit')
                        <a href="{{ route('admin.compids.edit',[$compid->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                        @endcan
                        @can('user_delete')
                        {!! Form::open(array(
                            'style' => 'display: inline-block;',
                            'method' => 'DELETE',
                            'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                            'route' => ['admin.compids.destroy', $compid->id])) !!}
                        {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                        {!! Form::close() !!}
                        @endcan
                    </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>
            <p>&nbsp;</p>
            <a href="{{ route('admin.clients.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


