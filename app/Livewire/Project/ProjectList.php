<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectList extends Component
{
    use WithPagination;

    public function render()
    {
        $projects = Project::where('is_active', true)
            ->orderBy('id', 'DESC')
            ->paginate(6);

        return view('livewire.project.project-list', compact('projects'))
            ->layout('layouts.web');
    }
}
