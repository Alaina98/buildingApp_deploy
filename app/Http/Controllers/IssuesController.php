<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\IssueRequestSubmitted;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\IssuesImport;
use App\Issues;
use App\User;
use Auth;

class IssuesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list(){
        //$data['issues']=Issues::all();
        $data['users']=User::all();
        return view('issues.list',$data);
    }

    public function store(Request $request)
    {
      $issue=new Issues();
        $issue->name=$request->name;
        $issue->email=$request->email;
        $issue->phone=$request->phone;
        $issue->msg=$request->msg;
        $issue->building_no=$request->building_no;
        $issue->apartment_no=$request->apartment_no;
        $issue->user_id=Auth::user()->id;
        $issue->attatchment=null;
        $issue->save();
        \Mail::to($issue->email)->send(new IssueRequestSubmitted($issue));
        return "Record is created Successfully";

    
    }
    public function importFromExcel(Request $request) 
    {
        Excel::import(new IssuesImport, $request->excelFile);
        
        return "SuccessFully";
    }

    
}
