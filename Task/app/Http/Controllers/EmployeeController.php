<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkLogin();
        $users = DB::table('users')->paginate(10);
        return view("User.Employee.view",compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkLogin();
        return view('User.Employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->checkLogin();
        $data = $this->validate(request(), 
            [
                'name'=>'required', 
                'email'=>'required',
                'password' => 'required',
            ]
            ,[],
            [
                'name' =>'Employee Name', 
                'email'=>'Employee Email',
                'password' => 'Employee Password'
            ]
        );
        $newEmployee = new User();
        $newEmployee->name = $request->input('name');
        $newEmployee->email = $request->input('email');
        $newEmployee->password = bcrypt($request->input('password'));
        $newEmployee->role = $request->input('role');
        $newEmployee->save();
        return redirect("displayEmployees");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->checkLogin();
        $user = User::findOrfail($id);
        return view("User.Employee.detail",compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->checkLogin();
        $employee = User::findOrfail($id);
        return view("User.Employee.update",compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->checkLogin();
        $data = $this->validate(request(), 
            [
                'name'=>'required', 
                'email'=>'required',
            ]
            ,[],
            [
                'name' =>'Employee Name', 
                'email'=>'Employee Email',
            ]
        );
        $updateEmployee = User::findOrfail($id);
        $updateEmployee->name = $request->input('name');
        $updateEmployee->email = $request->input('email');
        $updateEmployee->role = $request->input('role');
        $updateEmployee->save();
        return redirect("displayEmployees");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->checkLogin();
        $page = User::findOrfail($id);
        $page->delete();
        return redirect("displayEmployees");
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *****************************************************
     * Change Role the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeRole(Request $request, $id)
    {
        $this->checkLogin();
        if($request->isMethod('post')){
            $updateEmployee = User::findOrfail($id);
            $updateEmployee->role = $request->input('role');
            $updateEmployee->save();
            return redirect("displayEmployees");
            }
        $employee = User::findOrfail($id);
        return view("User.Employee.changeRole",compact('employee'));
    }

}
