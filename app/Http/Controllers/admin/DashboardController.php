<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        return view('admin.dashboard');
    }

    public function logout () {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect()->route('get.user.login');
    }


}
