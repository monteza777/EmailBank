<tr data-index="{{ $index }}">
    <td>{!! Form::text('clients['.$index.'][client_name]', old('clients['.$index.'][client_name]', isset($field) ? $field->client_name: ''), ['class' => 'form-control']) !!}</td>
    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>
