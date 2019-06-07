<tr data-index="{{ $index }}">
    <td>{!! Form::text('users['.$index.'][name]', old('users['.$index.'][name]', isset($field) ? $field->name: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::email('users['.$index.'][email]', old('users['.$index.'][email]', isset($field) ? $field->email: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>