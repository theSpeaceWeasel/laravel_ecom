<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Checkout;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function cartItems(){
        return $this->hasMany(Cart::class);
    }

    protected function checkouts(){
        return $this->belongsToMany(Checkout::class)->withPivot(['quantity','price'])->withTimestamps();
    }
    
}
