<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductSale
 *
 * @property $id
 * @property $purchase_price
 * @property $amount
 * @property $total
 * @property $product_id
 * @property $sale_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Product $product
 * @property Sale $sale
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProductSale extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['purchase_price', 'amount', 'total', 'product_id', 'sale_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sale()
    {
        return $this->belongsTo(\App\Models\Sale::class, 'sale_id', 'id');
    }
    
}
