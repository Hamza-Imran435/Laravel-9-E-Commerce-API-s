<?php

namespace App\Http\Resources\Shipment;

use Illuminate\Http\Resources\Json\JsonResource;

class ShippingAddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id'        => $this->id,
            'User_id'   => $this->User_id,
            'First_Name'=> $this->First_Name,
            'Last_Name' => $this->Last_Name,
            'Email'     => $this->Email,
            'Phone_No'  => $this->Phone_No,
            'Address'   => $this->Address,
        ];
    }
}
