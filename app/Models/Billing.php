<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'billing_date',
        'kwh_used',
        'rate',
        'amount',
        'vat',
        'due_date',
        'status',
    ];

    public function account() {
        return $this->belongsTo('App\Models\Account');
    }
}
