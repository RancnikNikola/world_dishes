<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Ingredient;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Meal extends Model implements TranslatableContract
{
    use HasFactory, SoftDeletes, Translatable;

    public $translatedAttributes = ['title', 'description'];

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        
        return $this->belongsToMany(Tag::class);
    }

    public function ingredients(){
        
        return $this->belongsToMany(Ingredient::class);
    }

    public function scopeFilter($query, $filters) {
        
        $query->when($filters['category'] ?? false, fn($query, $category) =>
                $query->whereHas('category', fn ($query) =>
                    $query->where('slug', $category)));

        $query->when($filters['tag'] ?? false, fn($query, $tag) =>
                $query->whereHas('tags', fn ($query) =>
                    $query->where('slug', $tag)));

        $query->when($filters['ingredient'] ?? false, fn($query, $ingredient) =>
                $query->whereHas('ingredients', fn ($query) =>
                    $query->where('slug', $ingredient)));
    }
}
