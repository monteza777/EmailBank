@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.cemails.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($cemails) > 0 ? 'datatable' : '' }} @can('user_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('user_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan
                        <th>@lang('quickadmin.cemails.fields.client_emails')</th>
                        <th>@lang('quickadmin.cemails.fields.created_date')</th>
                        <th>@lang('quickadmin.cemails.fields.deleted_date')</th>
                        <th>@lang('quickadmin.qa_action')</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($cemails) > 0)
                        @foreach ($cemails as $cemail)
                            <tr data-entry-id="{{ $cemail->id }}">
                                @can('user_delete')
                                    <td></td>
                                @endcan
                                <td field-key='name'>{{ $cemail->client_email }}</td>

                                <td field-key='email'>{{ $cemail->created_at }}</td>
                                <td field-key='email'>{{ $cemail->deleted_at}}</td>
                                                                <td>
                                    @can('user_view')
                                    <a href="{{ route('admin.cemails.cemails_ar',[$cemail->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('user_edit')
                                    <a href="{{ route('admin.cemails.restore',[$cemail->id]) }}" class="btn btn-xs btn-success">@lang('quickadmin.qa_restore')</a>
                                    @endcan
                                    @can('user_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.cemails.permanentDelete', $cemail->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
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
            window.route_mass_crud_entries_destroy = '{{ route('admin.cemails.mass_destroy') }}';
        @endcan

    </script>
@endsection