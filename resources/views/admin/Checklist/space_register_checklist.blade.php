@if ($spacetype_checklist != null)
<table id="mytable" class="table table-borderless"> 
    <tbody>
    <tr>
        <td>
            <ul class="list-columns">
            
            @foreach ($spacetype_checklist as $key => $cl)
            
                <li>
                    <div class="input-w">
                    <div class="checkbox checkbox-info checkbox-circle" style="margin-top: 0;">
                        {{ Form::hidden('getCLID[]', $cl->checklist_item_id) }}
                        {{ Form::hidden('cl_item_id['. $cl->checklist_item_id .']', 0) }}
                        <!-- CHECKBOX -->
                        
                        <input id="cl_is_checked{{ $cl->checklist_item_id }}" name="cl_item_id[{{ $cl->checklist_item_id }}]" type="checkbox" value="1">
                        
                        <label for="cl_is_checked{{ $cl->checklist_item_id }}"> {{ $cl->description }} </label>
                        <input id="cl_checklist_Value[{{ $cl->checklist_item_id }}]" type="hidden" class="form-control" name="cl_checklist_Value[{{ $cl->checklist_item_id }}]" value="">
                        @if ($cl->haveValue == 1)
                            <input id="cl_checklist_Value[{{ $cl->checklist_item_id }}]" type="text" class="form-control" name="cl_checklist_Value[{{ $cl->checklist_item_id }}]" value="{{ old('cl_value') }}" placeholder="{{ $cl->label }}" style="width:85px; height: 25px; margin-left:10px;">
                        @endif
                        </div>
                    </div>
                </li>   
            @endforeach

            </ul>
        </td>
    </tr>
    </tbody>
</table>
@else
<p>Select a Space Type</p>
@endif 