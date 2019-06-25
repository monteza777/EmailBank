@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.cemails.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.cemails.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('client_email', trans('quickadmin.cemails.fields.client_emails').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('client_email', old('client_email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('client_email'))
                        <p class="help-block">
                            {{ $errors->first('client_email') }}
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
