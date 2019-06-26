@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.issues.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.issues.fields.issues_name')</th>
                            <td field-key='title'>{{ $issues->issues_name }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <p>&nbsp;</p>
            <a href="{{ route('admin.issues.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


