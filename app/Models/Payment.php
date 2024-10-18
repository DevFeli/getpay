<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    use HasFactory;

    protected $fillable = [
        'payment_date',
        'amount',
        'status',
        'payment_method_id',
        'subscription_id',
    ];

    public function paymentMethod(){
        return $this->hasOne(PaymentMethod::class);
    }
}
