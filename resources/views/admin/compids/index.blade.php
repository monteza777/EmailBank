@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.compids.title')</h3>
    @can('user_create')
    <!-- <p>
        <a href="{{ route('admin.compids.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p> -->
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($compids) > 0 ? 'datatable' : '' }} @can('user_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('user_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.clients.fields.client_name')</th>
                        <th>@lang('quickadmin.compids.fields.compid_name')</th>
                        <th>@lang('quickadmin.compids.fields.created_date')</th>
                                                <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($compids) > 0)
                        @foreach ($compids as $compid)
                            <tr data-entry-id="{{ $compid->id }}">
                                @can('user_delete')
                                    <td></td>
                                @endcan
                                <td field-key='name'>
                                    {{ $compid->client->client_name }}
                                </td>
                                <td field-key='name'>
                                    <a href="{{route('admin.compids.gmail',[$compid->id])}}" target="_blank"> 
                                    {{ $compid->compid_name }}
                                    </a>
                                </td>

                                <td field-key='date'>
                                    {{ $compid->created_at->toDateTimeString() }}
                                </td>
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
@stop

@section('javascript') 
    <script>
        @can('user_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.compids.mass_destroy') }}';
        @endcan

    </script>
@endsection