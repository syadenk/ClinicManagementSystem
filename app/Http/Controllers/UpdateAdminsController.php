<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
class UpdateAdminsController extends Controller
{
    public function retrieve(Request $request, $staffTableID){
        $staffID=$request->session()->get('staffID');
        $staff = Admin::where('staffID', $staffID)->first();
        $staffData = Admin::where('staffID', $staffTableID)->first();
        return view('updateadmin', compact('staffData','staff'));
    }

    public function update(Request $request, $staffTableID){
        $staffID=$request->session()->get('staffID');
        $staff = Admin::where('staffID', $staffID)->first();
        $staffData = Admin::where('staffID', $staffTableID)->first();
        $staffID= $request->staffDataID;
        $staffPassword= $request->staffDataPassword;
        $staffName= $request->staffDataName;
        $phoneNumber= $request->staffDataPhoneNumber;

        if($staffName==""){
            return redirect()->route('updateadmin', ['staffTableID' => $staffTableID])->with('noName', 'Staff name is required.');
        }

        if($staffPassword==""){
            return redirect()->route('updateadmin', ['staffTableID' => $staffTableID])->with('noPassword', 'Staff password is required.');
        }

        if($phoneNumber==""){
            return redirect()->route('updateadmin', ['staffTableID' => $staffTableID])->with('noPhoneNum', 'Staff phone number is required.');
        }

        $staffData->staffID=$staffID;
        $staffData->staffName=$staffName;
        $staffData->staffPassword=$staffPassword;
        $staffData->phoneNumber=$phoneNumber;
        $staffData->save();
        return redirect('manageadmin')->with('success', 'Staff data updated successfully.');
    }

    public function delete($staffTableID){
        $staff = Admin::where('staffID', $staffTableID)->first();
        $staff->delete();
        return redirect()->route('manageadmin')->with('success', 'Staff record deleted successfully.');
    }

    
}
