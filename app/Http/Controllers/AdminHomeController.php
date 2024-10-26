<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function retrieve(Request $request){
        $staffID=$request->session()->get('staffID');
        $staff = Admin::where('staffID', $staffID)->first();
        return view('adminhome', compact('staff'));
    }

    public function adminLogout(Request $request){
        $request->session()->forget('staffID');
        // Redirect to the login page
        return redirect()->route('login');
    }


}
