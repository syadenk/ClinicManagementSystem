<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminLoginController extends Controller
{
    public function retrieve()
    {
        return view('adminlogin'); // Return the login view
    }

    public function login(Request $request){
        $ID=$request->id;
        $password=$request->password;
        $staff = Admin::where('staffID', $ID)->first();
        
        if ($staff==null){
            return redirect()->route('adminlogin')->with('nonexistentID', 'ID is nonexistent. Contact admin for registration.');
        }
        else{
            $staffID=$staff->staffID;
            if($staff->staffPassword==$password){
                $request->session()->put('staffID', $staffID);
                return redirect()->route('adminhome');
            } else {
                return redirect()->route('adminlogin')->with('false', 'Password is incorrect. Please try again.');
            }
    }
}
}