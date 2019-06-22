@extends('layouts.adminLayout')

@section('content')

    <div class="container">
        <h3 class="hh" >Change Role</h3> <hr>

        <form class="form-horizontal" role="form" name="form"action="/changeRole/{{$employee->id}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label class="col-md-4 control-label">Employee Role</label>
                <div class="col-md-4 edit">
                    <select class="form-control" name="role">
                    	<option value="1" @if($employee->role == 1) selected @endif>Admin</option>
                        <option value="2" @if($employee->role == 2) selected @endif>Employee</option>
                        <option value="3" @if($employee->role == 3) selected @endif>Customer Service</option>
                    </select>
                </div>                     
            </div>
            
            <br><br>
            <div class="form-group">
                <div class="col-md-4 ">
                    <input class="btn btn-primary btn-block" type="submit" value="Change Role " />
                </div>
            </div>
        </form>
    <br>
@endsection

