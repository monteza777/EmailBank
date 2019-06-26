@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.issues.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.issues.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('issues_name', trans('quickadmin.issues.fields.issues_name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('issues_name', old('issues_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('issues_name'))
                        <p class="help-block">
                            {{ $errors->first('issues_name') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    <a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
    {!! Form::close() !!}
@stop
