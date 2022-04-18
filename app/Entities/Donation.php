<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Entities\User;
use App\Entities\Billing;

class Donation extends Model
{
    protected $table = "donations";
    public $timestamps = true;

    public function billing() {
        return $this->belongsTo(Billing::class, 'billing_id');
    }
}
