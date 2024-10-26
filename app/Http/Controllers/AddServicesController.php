<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Services;
class AddServicesController extends Controller
{
    public function retrieve(Request $request){
        $staffID=$request->session()->get('staffID');
        $staff = Admin::where('staffID', $staffID)->first();

        $lastService = Services::orderBy('serviceID', 'desc')->first();
        if (!$lastService) {
            // If no previous record exists, start with P-001
            $serviceID = 'S001';
            return view('addservices', compact('serviceID','staff'));
        } else {
            // Extract numeric part and increment
            $lastIdNumber = (int) str_replace('S', '', $lastService->serviceID);
            $newIdNumber = $lastIdNumber + 1;
            // Format with leading zeros (e.g., P-001)
            $serviceID = 'S' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);
            return view('addservices', compact('serviceID','staff'));
        }
    }

    public function add(Request $request){
        $serviceName=$request->serviceName;
        $serviceType=$request->serviceType;
        $servicePrice=$request->servicePrice;
        $serviceID=$request->serviceID;
        if($serviceName==""){
            return redirect()->route('addservices')->with('noServiceName', 'Service name is required.');
        }

        if($servicePrice==""){
            return redirect()->route('addservices')->with('noPrice', 'Service price is required.');
        }

        $service= new services();


        $service->serviceID=$serviceID;
        $service->serviceName=$serviceName;
        $service->serviceType=$serviceType;
        $service->servicePrice=$servicePrice;
        $service->save();

        return redirect()->route('manageservices')->with('success', 'New service is added.');
    }
}
