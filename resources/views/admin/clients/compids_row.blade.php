<tr data-index="{{ $index }}">
    <td>{!! Form::text('compids['.$index.'][compid_name]', old('compids['.$index.'][compid_name]', isset($field) ? $field->compid_name: ''), ['class' => 'form-control']) !!}</td>
    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>
