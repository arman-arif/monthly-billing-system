<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'username', 'description', 'package_id', 'connection_date'
    ];


   public function bills()
   {
       return $this->hasMany(Billing::class, 'customer_id', 'id');
   }
}
