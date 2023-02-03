<?php

namespace App\Services;

use App\Http\Resources\Shipment\ShippingAddressResource;
use App\Models\Shipment;
use Illuminate\Support\Facades\Auth;

class ShipmentService{
    public function createAddress($request){
        $response = Shipment::create($request->validated());
        if($response){
            return response()->success('Shipping Address Added Successfully');
        }else{
            return response()->error('Something Went Wrong');
        }
    }

    public function addressList(){
        $user = Auth::id();
        $data = Shipment::where('User_id',$user)->get();
        $filtered_data = ShippingAddressResource::collection($data);
        if($data){
            return response()->success('True',$filtered_data);
        }else{
            return response()->error('Something Went Wrong');
        }
    }

    public function updateAddress($request){
        $user = Auth::id();
        $data = Shipment::where('User_id',$user)->where('id',$request->Address_id)->first();
        $data->First_Name = $request->First_Name;
        $data->Last_Name  = $request->Last_Name;
        $data->Email      = $request->Email;
        $data->Phone_No   = $request->Phone_No;
        $data->Address    = $request->Address;
        $data->save();
        if($data){
            return response()->success('Address Updated Successfully');
        }else{
            return response()->error('Something Went Wrong');
        }


    }

    public function deleteAddress($request){
        $user = Auth::id();
        $data = Shipment::where('User_id',$user)->where('id',$request->Address_id)->delete();
        if($data){
            return response()->success('Address Deleted Successfully');
        }else{
            return response()->error('Something Went Wrong');
        }
    }
}
