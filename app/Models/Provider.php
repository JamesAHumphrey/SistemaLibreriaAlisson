<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Provider
 *
 * @property $id
 * @property $name
 * @property $phone
 * @property $address
 * @property $email
 * @property $ruc
 *
 * @property Purchase[] $purchases
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Provider extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'phone', 'address', 'email', 'ruc'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchases()
    {
        return $this->hasMany(\App\Models\Purchase::class, 'id', 'provider_id');
    }
    
}
