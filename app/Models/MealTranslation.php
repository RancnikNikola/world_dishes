<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class MealTranslation extends Model
{
    public $translatedAttributes = ['title', 'description'];
    public $timestamps = false;
    protected $guarded = [];
}
