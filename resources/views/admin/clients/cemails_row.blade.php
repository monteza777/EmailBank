<tr data-index="{{ $index }}">
    <td>{!! Form::email('cemails['.$index.'][client_email]', old('cemails['.$index.'][client_email]', isset($field) ? $field->client_email: ''), ['class' => 'form-control']) !!}</td>
    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>
