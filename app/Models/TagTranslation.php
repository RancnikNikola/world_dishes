<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagTranslation extends Model
{
    public $translatedAttributes = ['title'];
    public $timestamps = false;

    protected $guarded = [];
}
