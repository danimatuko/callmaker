<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;


    public function calls()
    {
        return $this->hasMany(Call::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

}
