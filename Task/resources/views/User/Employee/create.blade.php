@extends('layouts.adminLayout')

@section('content')

    <div class="container">
        <h3 class="hh" >Create Employee</h3> <hr>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="form-horizontal" role="form" name="form"action="/storeEmployee" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label class="col-md-4 control-label ">Employee Name</label>
                <div class="col-md-4 ">
                    <input class="form-control" type="text" name="name" >
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label ">Employee Email</label>
                <div class="col-md-4 ">
                    <input class="form-control" type="email" name="email">
                </div>
            </div>

            <div class="form-group">
                <label for="author" class="col-md-4 control-label ">Employee Password:</label>
                <div class="col-md-4 ">
                    <input class="form-control" type="password" name="password"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Employee Role</label>
                <div class="col-md-4 edit">
                    <select class="form-control" name="role">
                        <option value="1">Admin</option>
                        <option value="2">Employee</option>
                        <option value="3">Customer Service</option>
                    </select>
                </div>                     
            </div>
            

            <br><br>
            <div class="form-group">
                <div class="col-md-4 ">
                    <input class="btn btn-primary btn-block" type="submit" value="Create " />
                </div>
            </div>
        </form>
    <br>
@endsection

