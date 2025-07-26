<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    public function run()
    {
        $clients = [
            [
                'name' => 'Acme Corporation',
                'email' => 'contact@acme.com',
                'phone' => '+1 555-123-4567',
                'website' => 'https://acme.com',
                'notes' => 'Regular corporate video client'
            ],
            [
                'name' => 'TechStart Inc.',
                'email' => 'info@techstart.io',
                'phone' => '+1 555-987-6543',
                'website' => 'https://techstart.io',
                'notes' => 'Startup needing product demos'
            ],
            // Add more clients as needed
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}