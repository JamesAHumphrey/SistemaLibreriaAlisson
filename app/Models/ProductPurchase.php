<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductPurchase
 *
 * @property $id
 * @property $purchase_price
 * @property $amount
 * @property $total
 * @property $product_id
 * @property $purchase_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Product $product
 * @property Purchase $purchase
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProductPurchase extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['purchase_price', 'amount', 'total', 'product_id', 'purchase_id'];


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
    public function purchase()
    {
        return $this->belongsTo(\App\Models\Purchase::class, 'purchase_id', 'id');
    }
    
}
