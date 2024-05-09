<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class PurchaseInvoice extends Model Implements HasMedia
{
    use HasFactory,SoftDeletes,interactsWithMedia;
    protected $guarded = [];



    public function books(){
        return $this->hasMany(Book::class);
    }

    public function changes(){
        return $this->hasMany(Change::class);
    }
    public function suppliers(){
        return $this->belongsTo(Supplier::class,'supplier_id');
    }



    // Enable cascading soft deletes for books
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($invoice) {
            $invoice->books()->delete();
        });
    }
}
