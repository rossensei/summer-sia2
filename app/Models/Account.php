<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'lname',
        'address',
        'email',
        'phone_no',
        'type',
    ];

    public function billings() {
        return $this->hasMany('App\Models\Billing');
    }
}
