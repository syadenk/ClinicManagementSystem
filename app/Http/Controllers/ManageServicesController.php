<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Services;
use Illuminate\Http\Request;

class ManageServicesController extends Controller
{
    public function retrieve(Request $request){
        $staffID=$request->session()->get('staffID');
        $staff = Admin::where('staffID', $staffID)->first();
        $service= Services::all();
        return view('manageservices', compact('service','staff'));
    }
}
