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

        <form class="form-horizontal" role="form" name="form"action="/storeIssue" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label class="col-md-4 control-label ">Customer Phone</label>
                <div class="col-md-4 ">
                    <input class="form-control" type="text" name="phone"  value="{{$phone}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label ">Customer Name</label>
                <div class="col-md-4 ">
                    <input class="form-control" type="text" name="name"  value="@if($customer) {{$customer->name}} @endif">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label ">Customer Email</label>
                <div class="col-md-4 ">
                    <input class="form-control" type="email" name="email" value="@if($customer) {{$customer->email}} @endif">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label ">Customer Issue</label>
                <div class="col-md-4 ">
                   <textarea class="form-control" name="issue" rows="4" cols="4" required=""> </textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Employees</label>
                <div class="col-md-4 edit">
                    <select class="form-control" name="employee_id">
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                        
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

