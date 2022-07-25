<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function payment(){
        return $this->belongsTo(Payment::class,'id','invoice_id');
    }

    public function invoice_details(){
        return $this->hasMany(InvoiceDetail::class, "invoice_id",'id');
    }

    public function product(){
        return $this->belongsTo(Product::class, "product_id",'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, "category_id",'id');
    }

}
