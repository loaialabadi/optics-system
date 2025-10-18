<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsAppMessage extends Model
{
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
