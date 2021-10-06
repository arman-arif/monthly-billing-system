<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'code',
        'speed',
        'duration',
        'price'
    ];


    /**
     * Get all of the bills for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customers()
    {
        return $this->hasMany(Customer::class, 'package_id', 'id');
    }

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = Str::lower($value);
    }

    public function getCodeAttribute($value)
    {
        return Str::upper($value);
    }

}
