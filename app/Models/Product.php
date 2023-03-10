<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function images() {
        return $this->hasMany(Mediaable::class,'product_id');
    }
    public function categories() {
        return $this->hasMany(ProductCategory::class,'product_id');
    }
}
