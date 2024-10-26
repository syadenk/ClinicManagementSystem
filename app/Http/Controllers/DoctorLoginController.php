<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
class DoctorLoginController extends Controller
{
    public function retrieve()
    {
        return view('doctorlogin'); // Return the login view
    }

    public function login(Request $request)
    {
        $doctorID=$request->doctorID;
        $doctorPassword=$request->doctorPassword;
        $doctor = Doctor::where('doctorID', $doctorID)->first();
        if ($doctor==null){
            return redirect()->route('login')->with('nonexistentID', 'ID is nonexistent. Contact admin for registration.');
        }
        else{
            if($doctor->doctorPassword==$doctorPassword){
                $request->session()->put('doctorID', $doctorID);
                return redirect()->route('doctorhome');
            } else {
                return redirect()->route('doctorlogin')->with('false', 'Password is incorrect. Please try again.');
            }
        }
    }
}

