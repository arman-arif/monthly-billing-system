<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'description',
        'package_id',
        'connection_date'
    ];

    /**
     * Get all of the bills for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bills()
    {
        return $this->hasMany(Billing::class, 'customer_id', 'id');
    }

    /**
     * Get the package for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function package()
    {
        return $this->hasOne(Package::class, 'id', 'package_id');
    }

    public function getConnectionDateAttribute($date) {
        return \Carbon\Carbon::parse($date)->format('d-m-Y');
    }
}
