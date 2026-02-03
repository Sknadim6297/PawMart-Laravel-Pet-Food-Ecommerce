<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'is_active',
        'sort_order',
        'parent_id'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Automatically generate slug from name
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    // Relationship with products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Parent category relationship
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Children (subcategories) relationship
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Scope for main categories (no parent)
    public function scopeMainCategories($query)
    {
        return $query->whereNull('parent_id');
    }

    // Scope for subcategories (has parent)
    public function scopeSubCategories($query)
    {
        return $query->whereNotNull('parent_id');
    }

    // Scope for active categories
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for ordering
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    // Get category image URL with fallback
    public function getImageUrlAttribute()
    {
        if ($this->image && file_exists(public_path($this->image))) {
            return asset($this->image);
        }
        // Return default category image
        return asset('assets/img/default-category.png');
    }

    // Get category image path with fallback for admin display
    public function getImagePathAttribute()
    {
        if ($this->image && file_exists(public_path($this->image))) {
            return $this->image;
        }
        return 'assets/img/default-category.png';
    }
}
