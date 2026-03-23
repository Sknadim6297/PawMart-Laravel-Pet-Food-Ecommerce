<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WelcomeSection extends Model
{
    protected $fillable = [
        'title',
        'description',
        'button_text',
        'button_link',
        'image',
        'sort_order',
        'is_active',
        // Service tile 1
        'service_title',
        'service_description',
        'service_icon',
        'service_link',
        // Service tile 2
        'service2_title',
        'service2_description',
        'service2_icon',
        'service2_link',
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }
}
