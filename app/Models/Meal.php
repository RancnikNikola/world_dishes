<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Category;
use App\Models\Language;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Meal extends Model implements TranslatableContract
{
    use HasFactory;
    use SoftDeletes;
    use Translatable;

    public $translatedAttributes = ['title', 'description'];
    protected $guarded = [];
    protected $with = ['category', 'tags', 'ingredients'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function ingredients() {
        return $this->belongsToMany(Ingredient::class);
    }

    public function languages() {
        return $this->hasMany(Language::class);
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
