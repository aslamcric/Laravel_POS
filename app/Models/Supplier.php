<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    // public function supplier(){
    //     return  $this->hasMany(Purchase::class);
    // }
    public function purchases() {
        return $this->hasMany(Purchase::class);
    }

}
