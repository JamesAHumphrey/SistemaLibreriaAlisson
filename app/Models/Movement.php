<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Movement
 *
 * @property $id
 * @property $observation
 * @property $amount
 * @property $unit_value
 * @property $total_value
 * @property $date
 * @property $unit_value_balance
 * @property $total_balance
 * @property $amount_balance
 * @property $code
 * @property $product_id
 * @property $type_id
 * @property $employee_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Employee $employee
 * @property Product $product
 * @property Type $type
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Movement extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['observation', 'amount', 'unit_value', 'total_value', 'date', 'unit_value_balance', 'total_balance', 'amount_balance', 'code', 'product_id', 'type_id', 'employee_id'];

    public static function generateCode(): string
    {
        $lastMovement = self::orderBy('id', 'desc')->first();
        $lastCode = $lastMovement ? $lastMovement->code : null;

        if ($lastCode) {
            $lastNumber = (int) str_replace('INI-', '', $lastCode);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return 'INI-' . $newNumber;
    }


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
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(\App\Models\Type::class, 'type_id', 'id');
    }
    
}
