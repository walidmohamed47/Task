@extends('layouts.customerServicesLayout')

@section('content')

<div class="container">
    <h3>Issues</h3>
    <table id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm  edit" cellspacing="0" width="100%">
        <thead>
            <th class="th-sm">Customer Phone
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Customer Name
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>                                    
            <th class="th-sm">Customer Email
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Customer Isses
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Employee Name
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Isses Type
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Update
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Delete
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
        </thead>
        <tbody>
            <div class="user">
                @foreach($issues as $issue)
                    <tr>
                        <td>
                            {{$issue->Customer->phone}}
                        </td>
                        <td>
                            {{$issue->Customer->name}}
                        </td>
                        <td>
                            {{$issue->Customer->email}}
                        </td>
                        <td>
                            {{$issue->issue}}
                        </td>
                        <td>
                            {{$issue->Employee->name}}
                        </td>
                        <td>
                            @if($issue->type == 1)
                                Not Done
                            @endif
                            @if($issue->type == 2)
                                Done
                            @endif
                        </td>
                        <td>
                            <a href="editIssue/{{$issue->id}}" >
                                Update
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="destroyIssue/{{$issue->id}}" >
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </div>
        </tbody>
    </table>
</div>
@endsection

