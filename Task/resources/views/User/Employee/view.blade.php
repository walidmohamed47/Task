@extends('layouts.adminLayout')

@section('content')

<div class="container">
    <h3>Employees</h3>
    <table id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm  edit" cellspacing="0" width="100%">
        <thead>
            <th class="th-sm">Employee Name
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>                                
            <th class="th-sm">Employee Email
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Employee Role
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Detail
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Update
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Change Role
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Delete
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
        </thead>
        <tbody>
            <div class="user">
                @foreach($users as $user)
                    <tr>
                        <td>
                            {{$user->name}}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                            @if($user->role == 1)
                                Admin
                            @endif
                            @if($user->role == 2)
                                Employee
                            @endif
                            @if($user->role == 3)
                                Customer Service
                            @endif
                        </td>
                        <td>
                            <a href="../showEmployee/{{$user->id}}">Detail</a>
                        </td>
                        <td>
                            <a href="../editEmployee/{{$user->id}}">Update</a>
                        </td>
                        <td>
                            <a href="../changeRole/{{$user->id}}">Change Role</a>
                        </td>
                        <td>
                            @if($user->role != 1)
                                <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="destroyEmployee/{{$user->id}}" >
                                    Delete
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </div>
            {{ $users->links() }}
        </tbody>
    </table>
</div>
@endsection

