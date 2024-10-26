<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function retrieve(Request $request){
        $patientID=$request->session()->get('patientID');
        $patientInfo = Patient::where('patientID', $patientID)->first();
        return view('home', compact('patientInfo'));
    }

    public function profile(Request $request){
        $patientID=$request->patientID;
        $request->session()->put('patientID', $patientID);
        return redirect()->route('profile');

    }

    public function service(Request $request){
        $patientID=$request->patientID;
        $request->session()->put('patientID', $patientID);
        return redirect()->route('service');

    }

    public function logout(Request $request){
        $request->session()->forget('patientID');
        // Redirect to the login page
        return redirect()->route('login');
    }
}
