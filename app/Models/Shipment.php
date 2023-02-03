<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;
    protected $table='shipments';
    protected $fillable = [
        'User_id',
        'First_Name',
        'Last_Name',
        'Email',
        'Phone_No',
        'Address',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
