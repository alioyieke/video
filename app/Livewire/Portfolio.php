<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class Portfolio extends Component
{
    use WithPagination;

    public $selectedCategory = 'all';
    public $availableCategories = [];
    protected $queryString = [
        'selectedCategory' => ['except' => 'all'],
        'page' => ['except' => 1],
    ];

    public function mount()
    {
        // Get all unique non-null categories from projects
        $this->availableCategories = Project::whereNotNull('category')
            ->distinct()
            ->pluck('category')
            ->toArray();
    }

    public function selectCategory($category)
    {
        $this->selectedCategory = $category;
        $this->resetPage();
    }

    public function render()
    {
        $projects = Project::query()
            ->when($this->selectedCategory !== 'all', function ($query) {
                $query->where('category', $this->selectedCategory);
            })
            ->with('client') // Eager load client relationship
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('livewire.portfolio', [
            'projects' => $projects,
            'categories' => $this->availableCategories
        ]);
    }
}