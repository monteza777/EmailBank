<tr data-index="{{ $index }}">
	<td>
	{!! Form::select('cemails['.$index.'][id]', $cemails,
		old('cemails['.$index.'][id]', isset($cemails) ? $compid->id: ''), ['class' => 'form-control ']) !!}
	</td>
    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>

<tr data-index="{{ $index }}">

<tr data-index="{{ $index }}">
	<select>
		<option></option>
	</select>
</tr>