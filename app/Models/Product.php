<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $retail_price
 * @property $wholesale_price
 * @property $current_stock
 * @property $current_total
 * @property $current_unit_price
 * @property $minimum_stocks
 * @property $code
 * @property $category_id
 * @property $unit_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Category $category
 * @property Unit $unit
 * @property Movement[] $movements
 * @property ProductPurchase[] $productPurchases
 * @property ProductSale[] $productSales
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'description', 'retail_price', 'wholesale_price', 'current_stock', 'current_total', 'current_unit_price', 'minimum_stocks', 'code', 'category_id', 'unit_id', 'brand_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo(\App\Models\Unit::class, 'unit_id', 'id');
    }

        /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(\App\Models\Brand::class, 'brand_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movements()
    {
        return $this->hasMany(\App\Models\Movement::class, 'id', 'product_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productPurchases()
    {
        return $this->hasMany(\App\Models\ProductPurchase::class, 'id', 'product_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productSales()
    {
        return $this->hasMany(\App\Models\ProductSale::class, 'id', 'product_id');
    }


    
}
