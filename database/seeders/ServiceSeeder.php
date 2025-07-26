<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'title' => 'Video Production',
                'description' => 'Full-service video production from concept to final edit'
            ],
            [
                'title' => 'Video Editing',
                'description' => 'Professional post-production and editing services'
            ],
            [
                'title' => 'Motion Graphics',
                'description' => 'Custom animations and motion graphic design'
            ],
            [
                'title' => 'Drone Videography',
                'description' => 'Aerial footage for your projects'
            ],
            [
                'title' => 'Live Event Coverage',
                'description' => 'Professional recording of live events'
            ],
        ];

        foreach ($services as $service) {
            Service::create([
                'title' => $service['title'],
                'slug' => Str::slug($service['title']),
                'description' => $service['description']
            ]);
        }
    }
}