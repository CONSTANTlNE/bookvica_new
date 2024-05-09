<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Change extends Model
{
    use HasFactory;


    public function purchaseInvoice(){
        return $this->belongsTo(PurchaseInvoice::class);
    }

    public function salesInvoice(){
        return $this->belongsTo(SalesInvoice::class);
    }
}
