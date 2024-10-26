<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorProfileController extends Controller
{
    public function retrieve(Request $request){
        $doctorID=$request->session()->get('doctorID');
        $doctor = Doctor::where('doctorID', $doctorID)->first();
        return view('doctorprofile', compact('doctor'));
    }

    public function update(Request $request){
        $doctorID=$request->session()->get('doctorID');
        $doctor = Doctor::where('doctorID', $doctorID)->first();
        $doctorName= $request->doctorName;
        $specialties= $request->specialties;
        $newPassword= $request->password;
        $oldPassword=$request->password_old;
        $confirmPassword=$request->password_confirmation;

        if($doctorName==""){
            return redirect()->route('doctorprofile')->with('noName', 'Name is required.');
        }

        if($specialties==""){
            return redirect()->route('doctorprofile')->with('noSpecialties', 'Specialties is required.');
        }

        if($newPassword!=""){//have
            if($oldPassword==""){//no
                if($confirmPassword!=""){//have
                    return redirect()->route('doctorprofile')->with('oldPasswordRequired', 'Old password is required.');
                } 
                else if($confirmPassword=="" ) {//n
                    return redirect()->route('doctorprofile')->with('passwordFieldsRequired', 'Password Fields are Required to be filled.');
                }
            }
            elseif($oldPassword!="" && $confirmPassword==""){
                return redirect()->route('doctorprofile')->with('confirmPassword', 'Password confirmation is required.');
            }

            elseif($oldPassword!=$doctor->doctorPassword && $newPassword==$confirmPassword){
                return redirect()->route('doctorprofile')->with('oldPasswordMismatched', 'Old password did not match. Please try again.');
            }
    
            elseif($oldPassword==$doctor->doctorPassword && $newPassword!=$confirmPassword){
                return redirect()->route('doctorprofile')->with('mismatchedPassword', 'New password did not match. Please try again.');
            }
    
            elseif($newPassword==$oldPassword && $newPassword == $confirmPassword){
                return redirect()->route('doctorprofile')->with('samePassword', 'Old Password and New Password is the same. Please try again.');
            }
            $doctor->doctorPassword=$newPassword;
        }
        $doctor->doctorID=$doctorID;
        $doctor->doctorName=$doctorName;
        $doctor->specialties=$specialties;
        $doctor->save();
        return redirect()->route('doctorhome')->with('success', 'Profile updated successfully.');
    }
}
