<thead>
<tr>
    <th class="text-center">ID</th>
    <th>Name</th>
    <th>Address</th>
    <th>Star</th>
    <th class="text-center action">Action</th>
</tr>
</thead>
<tbody>
@foreach($list_place as $place)
    <tr>
        <td class="text-center id">{{ $place['id'] }}</td>
        <td class="name">{{ $place['name'] }}</td>
        <td>{{ $place['address'] }}</td>
        <td class="is-admin">{{ $place['star'] }}</td>
        <td class="td-actions text-center">
            <button type="button" rel="tooltip" class="btn btn-info btn-round" title="Information" onclick="load_info(this)" data-toggle="modal" data-target="#myModal">
                <i class="material-icons">sort</i>
            </button>
            <button type="button" rel="tooltip" class="btn btn-success btn-round" title="Edit" onclick="edit_place_form(this)"data-toggle="modal" data-target="#myModal">
                <i class="material-icons">edit</i>
            </button>
            <button type="button" rel="tooltip" class="btn btn-danger btn-round" title="Delete" onclick="del_place(this)">
                <i class="material-icons">clear</i>
            </button>
        </td>
    </tr>
@endforeach
</tbody>
<tfoot>
<tr>
    <td colspan="5" class="text-center">
        {{ $list_place->links() }}
    </td>
</tr>
</tfoot>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">

        </div>
    </div>
</div>