<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [  'name','desc','price','old_price','image',
        'category_id','is_featured','is_on_sale','is_bestseller','sales_count'];
        public function category(){
        return $this->belongsTo(Category::class);
        }


       public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOnSale($query)
    {
        return $query->where('is_on_sale', true);
    }

    public function scopeBestseller($query)
    {
        return $query->orderBy('sales_count','desc');
    }
}
