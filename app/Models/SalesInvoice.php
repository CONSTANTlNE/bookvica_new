<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class SalesInvoice extends Model implements HasMedia
{
    use HasFactory,SoftDeletes,InteractsWithMedia;

    protected $guarded = [];
    public function books(){
        return $this->hasMany(Book::class);
    }
    public function changes(){
        return $this->hasMany(Change::class);
    }

    public function customers(){
        return $this->belongsTo(Customer::class,'customer_id');
    }



}
