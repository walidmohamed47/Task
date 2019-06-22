<?php

namespace App\Http\Controllers;
use App\Issue;
use App\Customer;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkLogin();
        $issues = Issue::where('employee_id',session()->get('id'))->where('type',1)->get();
        return view("Issue.view",compact('issues'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkLogin();
        return view('Issue.search');
    }

    /**
     * Search for phone.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchIssue(Request $request)
    {
        $this->checkLogin();
        $data = $this->validate(request(), 
            [
                'phone'=>'required',
            ]
            ,[],
            [
                'phone' =>'Customer Phone', 
            ]
        );

        $customer = null;
        $phone = $request->phone;
        $customer = Customer::where('phone',$phone)->first();
        $users = User::where('role',2)->get();
        return view('Issue.create',compact('customer','phone','users'));
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
        
        $customer = Customer::where('phone',$request->phone)->first();

        if($customer){
            $newIssue = new Issue();
            $newIssue->customer_id = $customer->id;
            $newIssue->employee_id = $request->employee_id;
            $newIssue->issue = $request->issue;
            $newIssue->type = 1;
            $newIssue->save();
        }
        else{
            $newCustomer = new Customer();
            $newCustomer->phone = $request->phone;
            $newCustomer->name = $request->name;
            $newCustomer->email = $request->email;
            $newCustomer->save();
            $newIssue = new Issue();
            $newIssue->customer_id = $newCustomer->id;
            $newIssue->employee_id = $request->employee_id;
            $newIssue->issue = $request->issue;
            $newIssue->type = 1;
            $newIssue->save();
        }
        return redirect("CustomerServices/home");
    }

    public function done($id)
    {
        $this->checkLogin();
        $Issue = Issue::findOrfail($id);
        $Issue->type = 2;
        $Issue->save();
        return redirect("viewIsses");
    }

    public function searchCustomerService(Request $request)
    {
        $this->checkLogin();
        
        if ($request->isMethod('post')) {
            $customer = Customer::where('phone',$request->phone)->first();
            $issues = Issue::where('customer_id',$customer->id)->get();
            return view('Issue.viewSearch',compact('issues'));
        }
        return view('Issue.searchCustomerService');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $issue = Issue::findOrfail($id);
        $users = User::where('role',2)->get();
        return view("Issue.update",compact('issue','users'));
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
                'issue'=>'required', 
            ]
            ,[],
            [
                'issue' =>'Customer Issue',
            ]
        );
        $updateIssue = Issue::findOrfail($id);
        $updateIssue->issue = $request->input('issue');
        $updateIssue->employee_id = $request->employee_id;
        $updateIssue->save();
        return redirect("CustomerServices/home");
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
        $issue = Issue::findOrfail($id);
        $issue->delete();
        return redirect("CustomerServices/home");
    }
}
