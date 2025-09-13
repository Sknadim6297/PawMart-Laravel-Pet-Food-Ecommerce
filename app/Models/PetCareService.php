<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class PetCareService extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'link',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->name);
            }
        });

        static::updating(function ($service) {
            if ($service->isDirty('name') && empty($service->slug)) {
                $service->slug = Str::slug($service->name);
            }
        });
    }

    /**
     * Scope to get only active services
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to order by sort_order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('name', 'asc');
    }

    /**
     * Get the icon URL
     */
    public function getIconUrlAttribute()
    {
        if ($this->icon) {
            return asset($this->icon);
        }
        return null;
    }

    /**
     * Get the service link
     */
    public function getServiceLinkAttribute()
    {
        if ($this->link) {
            // If it's an external URL, return as is
            if (filter_var($this->link, FILTER_VALIDATE_URL)) {
                return $this->link;
            }
            // Otherwise, treat as internal route
            return route($this->link);
        }
        return '#';
    }
}