<?php

namespace App\Http\Controllers;
use App\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $invalidMessage = '';
        if($request->isMethod('post')){
            $user =User::where('email','=',$request->input("email"))->first();
            if ($user!=null){
                if (Hash::check($request->input("password"),$user->password)){
                    session()->put('id', $user->id);
                    session()->put('name', $user->name);
                    session()->put('role', $user->role);
                    if ($user->role == 1 ){
                        return redirect('Admin/home');
                    }
                    if ($user->role == 2 ){
                        return redirect('Employee/home');
                    }
                    if ($user->role == 3 ){
                        return redirect('CustomerServices/home');
                    }
                }else{
                $invalidMessage = 'Invalid Password';
                return view('User.login',compact('invalidMessage'));
            }

            }else{
                $invalidMessage = 'Invalid Email';
                return view('User.login',compact('invalidMessage'));
            }
        }
        return view('User.login',compact('invalidMessage'));
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }

    public function myProfile()
    {
        $this->checkLogin();
        $user = User::findOrfail(session()->get('id'));
        if ($user->role == 1) {
            return view("User.Admin.profile",compact('user'));
        }
        if ($user->role == 2) {
            return view("User.Employee.profile",compact('user'));
        }
        if ($user->role == 3) {
            return view("User.CustomerServices.profile",compact('user'));
        }
        
    }
    public function changePassword()
    {
        $this->checkLogin();
        $invalidMessage = '';
        $user = User::findOrfail(session()->get('id'));
        if ($user->role == 1) {
            return view("User.Admin.changePassword",compact('user','invalidMessage'));
        }
        if ($user->role == 2) {
            return view("User.Employee.changePassword",compact('user','invalidMessage'));
        }
        if ($user->role == 3) {
            return view("User.CustomerServices.changePassword",compact('user','invalidMessage'));
        }
    }

    public function changedPassword(Request $request)
    {
        $this->checkLogin();
        $invalidMessage = '';
        $data = $this->validate(request(), 
            [
                'oldPassword'=>'required', 
                'newPassword'=>'required',
                'confirmedPassword' => 'required',
            ]
            ,[],
            [
                'oldPassword' =>'Old Password', 
                'newPassword'=>'New Password',
                'confirmedPassword' => 'Confirmed Password'
            ]
        );
        $user = User::findOrfail(session()->get('id'));

        if (Hash::check($request->input("oldPassword"),$user->password)){
            if($request->newPassword == $request->confirmedPassword){
                $user->password = bcrypt($request->newPassword);
                $user->save();
                if ($user->role == 1 ){
                    return redirect('Admin/home');
                }
                if ($user->role == 2 ){
                    return redirect('Employee/home');
                }
                if ($user->role == 3 ){
                    return redirect('CustomerServices/home');
                }
            }
            else{

                $invalidMessage = 'confirmed Password Must be same new password';
                if ($user->role == 1) {
                    return view("User.Admin.changePassword",compact('user','invalidMessage'));
                }
                if ($user->role == 2) {
                    return view("User.Employee.changePassword",compact('user','invalidMessage'));
                }
                if ($user->role == 3) {
                    return view("User.CustomerServices.changePassword",compact('user','invalidMessage'));
                }
            }
            
        }
        else{
            $invalidMessage = 'Your old password is wrong';
            if ($user->role == 1) {
                return view("User.Admin.changePassword",compact('user','invalidMessage'));
            }
            if ($user->role == 2) {
                return view("User.Employee.changePassword",compact('user','invalidMessage'));
            }
            if ($user->role == 3) {
                return view("User.CustomerServices.changePassword",compact('user','invalidMessage'));
            }
        }
        

    }
    public function adminHome()
    {
        $this->checkLogin();
        return view('User.Admin.home');
    }
    public function employeeHome()
    {
        $this->checkLogin();
        return view('User.Employee.home');
    }
    public function customerServicesHome()
    {
        $this->checkLogin();
        return view('User.CustomerServices.home');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
