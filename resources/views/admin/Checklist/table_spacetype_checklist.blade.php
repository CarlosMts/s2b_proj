<table id="mytable" class="table table-striped table-bordered table-list">
    <thead>
    <tr>
        <th></th>
        <th class="col-text"  style="text-align: center;">Checklist Item</th>
        <th style="text-align: center;">Filtro Pesquisa</th>
        <th style="text-align: center;">Medida</th>
        <th style="text-align: center;"><a data-toggle="modal" id="openModal"><i class="glyphicon glyphicon-plus-sign"></i></a></th> 

    </tr>
    </thead>
    <tbody>
    @foreach ($spacetype_checklist as $key => $cl)
    <tr>
        <td>
            <div class="checkbox checkbox-info checkbox-circle">
                {{ Form::hidden('getID[]', $cl->id) }}
                {{ Form::hidden('item_id['. $cl->id .']', 0) }}
                <!-- CHECKBOX -->
                {{ Form::checkbox('item_id['. $cl->id .']', 1, $cl->check, ['id' => 'is_checked'. $cl->id .'\'']) }}
                {{ Form::label('is_checked'. $cl->id .'\'', ' ') }}
            </div>
        </td>
        <td>{{ $cl->description }}</td>
        <td>
            @if( $cl->isFilter == 1)
               <i class="glyphicon glyphicon-ok">
            @endif
        </td>
        <td>{{ $cl->label }}</td>
        <td>
            <a data-toggle="modal" class="editModal" data-id="{{ $cl->id }}" data-description="{{ $cl->description }}" data-isFilter="{{ $cl->isFilter }}" data-haveValue="{{ $cl->haveValue }}" data-label="{{ $cl->label }}"><i class="glyphicon glyphicon-pencil"></i></a>
            <a data-toggle="modal" class="deleteModal" data-id="{{ $cl->id }}" data-description="{{ $cl->description }}" ><i class="glyphicon glyphicon-remove"></i></a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
