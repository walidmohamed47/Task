@extends('layouts.EmployeeLayout')

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
            <th class="th-sm">Done
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
                            <a  onclick="return confirm('Are you sure?')" href="done/{{$issue->id}}" >
                                Done
                            </a>
                        </td>
                    </tr>
                @endforeach
            </div>
        </tbody>
    </table>
</div>
@endsection

