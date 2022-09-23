<?php

namespace App\Models;

use App\Models\Store;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','description', 'price'];

    /**
     *--------------------------------------------------------------------------
     * Model Relations
     *--------------------------------------------------------------------------
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

}
