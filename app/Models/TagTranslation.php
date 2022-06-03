<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class TagTranslation extends Model
{
    public $translatedAttributes = ['title'];
    public $timestamps = false;
    protected $guarded = [];
}
