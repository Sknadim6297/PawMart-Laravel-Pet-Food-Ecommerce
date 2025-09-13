<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PetCareService;

class PetCareServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Online Order',
                'slug' => 'online-order',
                'description' => 'Order premium pet food and supplies online with fast delivery to your doorstep.',
                'icon' => 'assets/img/welcome-to-3.png',
                'link' => 'products.index',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Pet Grooming',
                'slug' => 'pet-grooming',
                'description' => 'Professional grooming services to keep your pets clean, healthy, and looking their best.',
                'icon' => 'assets/img/welcome-to-1.png',
                'link' => 'services',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Pet Boarding',
                'slug' => 'pet-boarding',
                'description' => 'Safe and comfortable boarding facilities for your pets when you\'re away.',
                'icon' => 'assets/img/welcome-to-4.png',
                'link' => 'services',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Dog Walking',
                'slug' => 'dog-walking',
                'description' => 'Professional dog walking services to keep your furry friends active and healthy.',
                'icon' => 'assets/img/welcome-to-2.png',
                'link' => 'services',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            PetCareService::updateOrCreate(
                ['slug' => $service['slug']],
                $service
            );
        }
    }
}