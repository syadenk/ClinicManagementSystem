<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
class ManageAdminsController extends Controller
{
    public function retrieve(Request $request){
        $staffID=$request->session()->get('staffID');
        $staff = Admin::where('staffID', $staffID)->first();
        $staffTable= Admin::all();
        return view('manageadmin', compact('staffTable','staff'));
    }
}
