<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sale
 *
 * @property $id
 * @property $price
 * @property $amount
 * @property $customer_name
 * @property $customer_phone
 * @property $subtotal
 * @property $total
 * @property $discount
 * @property $invoice_number
 * @property $code
 * @property $employee_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Employee $employee
 * @property ProductSale[] $productSales
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Sale extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['price', 'amount', 'customer_name', 'customer_phone', 'subtotal', 'total', 'discount', 'invoice_number', 'code', 'employee_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'employee_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productSales()
    {
        return $this->hasMany(\App\Models\ProductSale::class, 'id', 'sale_id');
    }
    
}
