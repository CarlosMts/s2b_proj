@if ($spacechecklist != null)
<table id="mytable" class="table table-borderless"> 
    <tbody>
    <tr>
        <td>
            <ul class="list-columns">
            
            @foreach ($spacechecklist as $key => $cl)
                <li>
                    <div class="input-w">
                    <div class="checkbox checkbox-info checkbox-circle" style="margin-top: 0;">
                        {{ Form::hidden('getCLID[]', $cl->item_id) }}
                        {{ Form::hidden('cl_item_id['. $cl->item_id .']', 0) }}
                        <!-- CHECKBOX -->

                        {{ Form::checkbox('cl_item_id['. $cl->item_id .']', 1, $cl->status, ['id' => 'cl_is_checked'. $cl->item_id .'\'']) }}
                        {{ Form::label('cl_is_checked'. $cl->item_id .'\'', ' ') }}

                        {{ $cl->description }}

                        <input id="cl_checklist_Value[{{ $cl->item_id }}]" type="hidden" class="form-control" name="cl_checklist_Value[{{ $cl->item_id }}]" value="">
                        
                        @if ($cl->haveValue != null)
                            <input id="cl_checklist_Value[{{ $cl->item_id }}]" type="text" class="form-control" name="cl_checklist_Value[{{ $cl->item_id }}]" value="{{ $cl->value }}" placeholder="{{ $cl->label }}" style="width:90px; height: 25px; margin-left:10px;">
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