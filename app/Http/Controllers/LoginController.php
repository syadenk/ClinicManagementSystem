<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    public function retrieve()
    {
        return view('login'); // Return the login view
    }
    public function loginform(Request $request){
        $email=$request->email;
        $password=$request->password;
        $patient = Patient::where('patientEmail', $email)->first();
        
        if ($patient==null){
            return redirect()->route('login')->with('nonexistentEmail', 'Email does not exist. Please register first.');
        }
        else{
            $patientID=$patient->patientID;
            if($patient->patientPassword==$password){
                $request->session()->put('patientID', $patientID);
                return redirect()->route('home');
            } else {
                return redirect()->route('login')->with('false', 'Password is incorrect. Please try again.');
            }
        }
    }
}
