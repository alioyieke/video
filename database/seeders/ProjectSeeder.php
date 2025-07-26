<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        // Clear existing projects
        Project::query()->delete();

        // Sample project categories
        $categories = ['Corporate', 'Commercial', 'Wedding', 'Documentary', 'Event'];
        
        // Sample video URLs
        $videoUrls = [
            'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'https://vimeo.com/148751763',
            'https://www.youtube.com/watch?v=9bZkp7q19f0',
            'https://vimeo.com/128373540',
            'https://www.youtube.com/watch?v=JGwWNGJdvx8'
        ];

        // Get all clients or create some if none exist
        $clients = Client::all();
        if ($clients->isEmpty()) {
            $clients = Client::take(5)->get();
        }

        // Create projects for each client
        foreach ($clients as $client) {
            $projectCount = rand(2, 5);
            
            for ($i = 0; $i < $projectCount; $i++) {
                $title = $this->generateProjectTitle();
                
                Project::create([
                    'title' => $title,
                    'slug' => Str::slug($title),
                    'description' => $this->generateProjectDescription(),
                    'video_url' => $videoUrls[array_rand($videoUrls)],
                    'image' => 'projects/project-' . rand(1, 10) . '.jpg',
                    'category' => $categories[array_rand($categories)],
                    'client_id' => $client->id,
                ]);
            }
        }

        // Create some projects without clients
        $standaloneProjects = [
            [
                'title' => 'Corporate Brand Video',
                'description' => 'A professional brand video for corporate identity',
                'video_url' => $videoUrls[0],
                'category' => 'Corporate'
            ],
            [
                'title' => 'Wedding Highlights',
                'description' => 'Beautiful wedding day highlights film',
                'video_url' => $videoUrls[1],
                'category' => 'Wedding'
            ],
            // Add more as needed
        ];

        foreach ($standaloneProjects as $project) {
            Project::create([
                'title' => $project['title'],
                'slug' => Str::slug($project['title']),
                'description' => $project['description'],
                'video_url' => $project['video_url'],
                'image' => 'projects/project-' . rand(1, 10) . '.jpg',
                'category' => $project['category'],
                'client_id' => null
            ]);
        }
    }

    /**
     * Generate random project titles
     */
    protected function generateProjectTitle(): string
    {
        $types = ['Video', 'Film', 'Production', 'Documentary', 'Commercial'];
        $subjects = ['Corporate', 'Brand', 'Product', 'Event', 'Wedding'];
        $descriptors = ['2023', 'Special', 'Official', 'Behind the Scenes', 'Day in the Life'];
        
        return implode(' ', [
            $subjects[array_rand($subjects)],
            $types[array_rand($types)],
            $descriptors[array_rand($descriptors)]
        ]);
    }

    /**
     * Generate random project descriptions
     */
    protected function generateProjectDescription(): string
    {
        $descriptions = [
            'A professional video production showcasing our client\'s products and services.',
            'Behind-the-scenes footage and interviews with the team.',
            'A cinematic representation of our client\'s brand identity.',
            'Event coverage with multiple camera angles and professional editing.',
            'A documentary-style film telling our client\'s story.'
        ];
        
        return $descriptions[array_rand($descriptions)];
    }
}