<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function images() {
        return $this->morphMany(Mediaable::class,'mediaable');
    }
    public function categories() {
        return $this->morphMany(ProductCategory::class,'productcategory');
    }
}
