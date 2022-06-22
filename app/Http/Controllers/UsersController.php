<?php

namespace App\Http\Controllers;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Issue;
use App\User;
use Auth;


class UsersController extends Controller
{
    //
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    
}
