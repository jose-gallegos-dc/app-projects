<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Livewire\Component;

class ProjectList extends Component
{
    public function render()
    {
        $projects = Project::where('is_active', true)->get();

        return view('livewire.project.project-list', compact('projects'));
    }
}
