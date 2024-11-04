<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Services;
use Illuminate\Http\Request;

class UpdateServicesController extends Controller
{
    public function retrieve(Request $request, $serviceID){
        $staffID=$request->session()->get('staffID');
        $staff = Admin::where('staffID', $staffID)->first();
        $service= Services::find($serviceID);
        return view('updateservices', compact('service','staff'));
    }

    public function update(Request $request){
        $serviceID=$request->serviceID;
        $service = Services::where('serviceID', $serviceID)->first();
        $serviceName= $request->serviceName;
        $serviceType= $request->serviceType;
        $servicePrice= $request->servicePrice;

        if($serviceName==""){
            return redirect()->route('updateservices', ['serviceID' => $service->serviceID])->with('noServiceName', 'Service name is required.');
        }

        if($servicePrice==""){
            return redirect()->route('updateservices', ['serviceID' => $service->serviceID])->with('noPrice', 'Service price is required.');
        }

        $service->serviceID=$serviceID;
        $service->serviceName=$serviceName;
        $service->serviceType=$serviceType;
        $service->servicePrice=$servicePrice;
        $service->save();

        return redirect()->route('manageservices', ['serviceID' => $service->serviceID])->with('success', 'Service updated successfully.');
    }

    public function delete($serviceID){
        $service = services::where('serviceID', $serviceID)->first();
        $service->delete();
        return redirect()->route('manageservices')->with('success', 'Service deleted successfully.');
    }

}
