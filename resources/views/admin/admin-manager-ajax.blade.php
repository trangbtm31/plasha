<thead>
<tr>
    <th class="text-center">User ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Is Admin?</th>
    <th class="text-center">Admin Permission</th>
</tr>
</thead>
<tbody>
@foreach($list_user as $user)
    <tr>
        <td class="text-center">{{ $user['id'] }}</td>
        <td>{{ $user['first_name'] }} {{ $user['last_name'] }}</td>
        <td>{{ $user['email'] }}</td>
        <td class="is-admin">{{ $user['admin'] == 1 ? 'Yes' : 'No' }}</td>
        <td class="td-actions text-center">
            @if($user['admin'] == 0)
                <button rel="tooltip" class="btn btn-success" user_id="{{ $user['id'] }}" onclick="change_ad_permission(this)"><i class="material-icons">check</i><span>Add</span></button>
            @else
                <button rel="tooltip" class="btn btn-danger" user_id="{{ $user['id'] }}" onclick="change_ad_permission(this)"><i class="material-icons">close</i><span>Del</span></button>
            @endif
        </td>
    </tr>
@endforeach
</tbody>
<tfoot>
    <tr>
        <td colspan="5" class="text-center">
            {{ $list_user->links() }}
        </td>
    </tr>
</tfoot>