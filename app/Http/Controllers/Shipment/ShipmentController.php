<?php

namespace App\Http\Controllers\Shipment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shipment\DeleteAddressRequest;
use App\Http\Requests\Shipment\ShipmentCreateRequest;
use App\Http\Requests\Shipment\UpdateAddressRequest;
use App\Services\ShipmentService;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class ShipmentController extends Controller
{
    public function __construct(protected ShipmentService $shipmentService){}

    public function createAddress(ShipmentCreateRequest $request){
        $response = $this->shipmentService->createAddress($request);
        return $response;
    }

    public function addressList(){
        $response = $this->shipmentService->addressList();
        return $response;
    }

    public function updateAddress(UpdateAddressRequest $request){
        $response = $this->shipmentService->updateAddress($request);
        return $response;
    }

    public function deleteAddress(DeleteAddressRequest $request){
        $response = $this->shipmentService->deleteAddress($request);
        return $response;
    }
}
