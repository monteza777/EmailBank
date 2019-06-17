<tr data-index="{{ $index }}">
	<td>
	{!! Form::select('cemails['.$index.'][cemail_id]', $cemails,
		old('cemails['.$index.'][cemail_id]', isset($field) ? $field->cemail_id: ''), ['class' => 'form-control ']) !!}
	</td>
    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>