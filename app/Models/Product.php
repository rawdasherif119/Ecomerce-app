<?php

namespace App\Models;

use App\Models\Store;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price'];


    public function getgrossPriceAttribute()
    {
        return $this->store->vat_percentage ?
            $this->price + ($this->price * ($this->store->vat_percentage / 100)) :
            $this->price;
    }

    /**
     *--------------------------------------------------------------------------
     * Model Relations
     *--------------------------------------------------------------------------
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function users()
    {
        return $this->belongsToMany(Product::class, 'user_product', 'product_id', 'user_id');
    }
}
