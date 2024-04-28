<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function purchaseinvoices()
    {
        return $this->belongsTo(PurchaseInvoice::class,'purchase_invoice_id','id');
    }

    public function salesInvoices(){
        return $this->belongsTo(SalesInvoice::class,'sales_invoice_id','id');
    }

}
