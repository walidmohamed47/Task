@extends('layouts.adminLayout')

@section('content')

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h3 class="hh" >Change Password</h3> <hr>
        @if ($invalidMessage!= '')
            <div class="alert alert-danger">
                <ul>
                    <li>{{ $invalidMessage }}</li>
                </ul>
            </div>
        @endif
        <form class="form-horizontal" role="form" name="form"action="/changedPassword" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="author" class="col-md-4 control-label ">Old Password:</label>
                <div class="col-md-4 ">
                    <input class="form-control" type="password" name="oldPassword"/>
                </div>
            </div>
            
            <div class="form-group">
                <label for="author" class="col-md-4 control-label ">New Password:</label>
                <div class="col-md-4 ">
                    <input class="form-control" type="password" name="newPassword"/>
                </div>
            </div>

            <div class="form-group">
                <label for="author" class="col-md-4 control-label ">Confirmed Password:</label>
                <div class="col-md-4 ">
                    <input class="form-control" type="password" name="confirmedPassword"/>
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

