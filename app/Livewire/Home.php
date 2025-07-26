<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\Service;
use Livewire\Component;

class Home extends Component
{
    public $latestServices;
    public $latestProjects;

    public function mount()
    {
        $this->latestServices = Service::latest()
            ->take(4)
            ->get();

        $this->latestProjects = Project::latest()
            ->take(7)
            ->get();
    }
    public function render()
    {
        return view('livewire.home');
    }
}
