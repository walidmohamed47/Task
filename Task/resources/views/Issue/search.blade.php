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

        <form class="form-horizontal" role="form" name="form"action="/searchIssue" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label class="col-md-4 control-label ">Customer Phone</label>
                <div class="col-md-4 ">
                    <input class="form-control" type="text" name="phone" >
                </div>
            </div>

            <br><br>
            <div class="form-group">
                <div class="col-md-4 ">
                    <input class="btn btn-primary btn-block" type="submit" value="Search " />
                </div>
            </div>
        </form>
    <br>
@endsection

