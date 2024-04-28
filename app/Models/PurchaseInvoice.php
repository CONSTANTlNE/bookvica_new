<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function books(){
        return $this->hasMany(Book::class);
    }
    public function suppliers(){
        return $this->belongsTo(Supplier::class,'supplier_id');
    }
}
