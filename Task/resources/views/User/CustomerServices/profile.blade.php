@extends('layouts.customerServicesLayout')

@section('content')


<div class="container">
	<div class="form-group">
        <label class="col-md-4 control-label ">Your Name</label>
        <label class="col-md-4 control-label ">{{$user->name}}</label>
    </div><hr>
    <div class="form-group">
        <label class="col-md-4 control-label ">Your Email</label>
        <label class="col-md-4 control-label ">{{$user->email}}</label>
    </div><hr>
    <div class="form-group">
        <label class="col-md-4 control-label ">Your Role</label>
        <label class="col-md-4 control-label ">
        	@if($user->role == 1)
                Admin
            @endif
            @if($user->role == 2)
            	Employee
            @endif
            @if($user->role == 3)
                Customer Service
            @endif
        </label>
    </div><hr>
    <div class="form-group">
        <label class="col-md-4 control-label ">Change Password</label>
        <label class="col-md-4 control-label "><a href="changePassword" >Change Password</a></label>
    </div><hr>
</div>

@endsection