<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'author', 'content'];

    protected $with = ['category']; // Default eager loading

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $query, array $filters):void{

        $query->when(
            $filters['category'] ?? false,
            fn($query, $category) => 
            $query->whereHas('category', fn($query) => $query->where('slug', $category))
        );

    }
}
