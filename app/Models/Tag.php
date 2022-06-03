<?php

namespace App\Models;

Use App\Models\Meal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Tag extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['title'];
    protected $guarded = [];

    public function meals() {
        return $this->belongsToMany(Meal::class);
    }
}
