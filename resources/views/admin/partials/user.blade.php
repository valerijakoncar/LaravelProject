<tr>
    <td>{{ $i }}</td>
    <td>{{ $u->username }}</td>
    <td>{{ $u->pass }}</td>
    <td>{{ $u->email }}</td>
    <td>{{ $u->phone }}</td>
    <td>{{ $u->gender }}</td>
    <td>{{ $u->send_via_mail }}</td>
    @if($u->role_id==1)
        <td>Admin</td>
    @else
        <td>User</td>
    @endif
    <td>
        <input type='button' data-id='{{ $u->id }}' value='Update' class='updUser'/>
        <input type='button' data-id='{{ $u->id }}' value='Delete' class='delUser'/>
    </td>
</tr>
