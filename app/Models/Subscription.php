<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_id',
        'status',
        'type',
        'start',
        'end',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function plan(){
        return $this->belongsTo(Plan::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
