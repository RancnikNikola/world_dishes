<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\Meal;

class Tag extends Model
{
    use HasFactory;

    public function meals(){

        return $this->belongsToMany(Meal::class);
    }
}
