<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Purchase
 *
 * @property $id
 * @property $total
 * @property $date
 * @property $invoice_number
 * @property $code
 * @property $provider_id
 * @property $employee_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Employee $employee
 * @property Provider $provider
 * @property ProductPurchase[] $productPurchases
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Purchase extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['total', 'date', 'invoice_number', 'code', 'provider_id', 'employee_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'employee_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provider()
    {
        return $this->belongsTo(\App\Models\Provider::class, 'provider_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productPurchases()
    {
        /*
        *Se modifico el orden de los id para la relacion
        */
        return $this->hasMany(\App\Models\ProductPurchase::class, 'purchase_id', 'id');
    }

}
