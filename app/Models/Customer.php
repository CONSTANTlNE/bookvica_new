<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function invoices(){
        return $this->hasMany(SalesInvoice::class,'customer_id');
    }
}
