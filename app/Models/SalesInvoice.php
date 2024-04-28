<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesInvoice extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function books(){
        return $this->hasMany(Book::class);
    }
    public function customers(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
}
