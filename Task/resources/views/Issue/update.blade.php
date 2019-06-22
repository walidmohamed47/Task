@extends('layouts.customerServicesLayout')

@section('content')

    <div class="container">
        <h3 class="hh" >Create Issue</h3> <hr>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="form-horizontal" role="form" name="form"action="/updateIssue/{{$issue->id}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}


            <div class="form-group">
                <label class="col-md-4 control-label ">Customer Issue</label>
                <div class="col-md-4 ">
                   <textarea class="form-control" name="issue" rows="4" cols="4" required=""> {{$issue->issue}} </textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Employees</label>
                <div class="col-md-4 edit">
                    <select class="form-control" name="employee_id">
                        @foreach($users as $user)
                            <option value="{{$user->id}}" @if($issue->employee_id == $user->id) selected @endif >{{$user->name}}</option>
                        @endforeach
                        
                    </select>
                </div>                     
            </div>
            <br><br>
            <div class="form-group">
                <div class="col-md-4 ">
                    <input class="btn btn-primary btn-block" type="submit" value="update " />
                </div>
            </div>
        </form>
    <br>
@endsection

