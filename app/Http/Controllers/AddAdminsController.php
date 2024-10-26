<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;

class AddAdminsController extends Controller
{
    public function retrieve(Request $request){
        $staffID=$request->session()->get('staffID');
        $staff = Admin::where('staffID', $staffID)->first();
        

        $lastAdmin = Admin::orderBy('staffID', 'desc')->first();
        if (!$lastAdmin) {
            // If no previous record exists, start with P-001
            $serviceID = 'A001';
            return view('addadmin', compact('staffID','staff'));
        } else {
            // Extract numeric part and increment
            $lastIdNumber = (int) str_replace('A', '', $lastAdmin->staffID);
            $newIdNumber = $lastIdNumber + 1;
            // Format with leading zeros (e.g., P-001)
            $staffID = 'A' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);
            return view('addadmin', compact('staffID','staff'));
        }
    }

    public function add(Request $request){
        $staffName=$request->staffName;
        $staffPassword=$request->staffPassword;
        $phoneNumber=$request->phoneNumber;
        $staffID=$request->staffID;
        if($staffName==""){
            return redirect()->route('addadmin')->with('noStaffName', 'Staff name is required.');
        }

        if($staffPassword==""){
            return redirect()->route('addadmin')->with('noPassword', 'Staff password is required.');
        }

        if($phoneNumber==""){
            return redirect()->route('addadmin')->with('noPhoneNum', 'Staff phone number is required.');
        }

        $admin= new Admin();


        $admin->staffID=$staffID;
        $admin->staffName=$staffName;
        $admin->staffPassword=$staffPassword;
        $admin->phoneNumber=$phoneNumber;
        $admin->save();

        return redirect()->route('manageadmin')->with('success', 'New admin is added.');
    }
}
