<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Type
 *
 * @property $id
 * @property $name
 * @property $transaction
 * @property $created_at
 * @property $updated_at
 *
 * @property Movement[] $movements
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Type extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'transaction'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movements()
    {
        return $this->hasMany(\App\Models\Movement::class, 'id', 'type_id');
    }
    
}
