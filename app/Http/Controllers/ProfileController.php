<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class ProfileController extends Controller
{
    public function retrieve(){
        $patientID = session('patientID');
        $patientInfo = Patient::where('patientID', $patientID)->first();
        return view('profile', compact('patientInfo'));
    }

    public function home(Request $request){
        $patientID=$request->patientID;
        $request->session()->put('patientID', $patientID);
        return redirect()->route('home');

    }

    public function updateProfile(Request $request){
        $patientID = session('patientID');
        $patientInfo = Patient::where('patientID', $patientID)->first();
        $newPassword= $request->password;
        $oldPassword= $request->password_old;
        $confirmPassword= $request->password_confirmation;
        $bloodPressure= $request->bloodPressure;
        $phoneNumber= $request->phoneNumber;
        $patientName=$request->name;
        $patientEmail=$request->email;
        $patientIC=$request->ic;

        if($phoneNumber==""){
            return redirect()->route('profile')->with('noPhoneNumber', 'Phone Number is required.');
        }

        if($patientName==""){
            return redirect()->route('profile')->with('noName', 'Name is required.');
        }

        if($patientEmail==""){
            return redirect()->route('profile')->with('noEmail', 'Email is required.');
        }

        if($patientIC==""){
            return redirect()->route('profile')->with('noIC', 'Identification Card number is required.');
        }



        if($newPassword!=""){//have
            if($oldPassword==""){//no
                if($confirmPassword!=""){//have
                    return redirect()->route('profile')->with('oldPasswordRequired', 'Old password is required.');
                } 
                else if($confirmPassword=="" ) {//n
                    return redirect()->route('profile')->with('passwordFieldsRequired', 'Password Fields are Required to be filled.');
                }
            }
            elseif($oldPassword!="" && $confirmPassword==""){
                return redirect()->route('profile')->with('confirmPassword', 'Password confirmation is required.');
            }

            elseif($oldPassword!=$patientInfo->patientPassword && $newPassword==$confirmPassword){
                return redirect()->route('profile')->with('oldPasswordMismatched', 'Old password did not match. Please try again.');
            }
    
            elseif($oldPassword==$patientInfo->patientPassword && $newPassword!=$confirmPassword){
                return redirect()->route('profile')->with('mismatchedPassword', 'New password did not match. Please try again.');
            }
    
            elseif($newPassword==$oldPassword && $newPassword == $confirmPassword){
                return redirect()->route('profile')->with('samePassword', 'Old Password and New Password is the same. Please try again.');
            }
            $patientInfo->patientPassword=$newPassword;
        }
        $patientInfo->patientID=$patientID;
        $patientInfo->patientEmail=$request->email;
        $patientInfo->patientName=$request->name;
        $patientInfo->phoneNumber=$phoneNumber;
        $patientInfo->bloodPressure=$bloodPressure;
        $patientInfo->patientIC=$patientIC;
        $patientInfo->save();
        return redirect()->route('profile')->with('success', 'Profile updated successfully.');

    }

    public function logout(Request $request){
        $request->session()->forget('patientID');
        // Redirect to the login page
        return redirect()->route('login');
    }
}
