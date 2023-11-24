<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Livewire\Component;

class ProjectDetails extends Component
{
    public $project;

    public function mount($slug)
    {
        // Devuelve el proyecto activo con base en el valor del slug.
        $this->project = Project::where('slug', $slug)
            ->where('is_active', true)
            ->first();
    }

    public function render()
    {
        return view('livewire.project.project-details');
    }
}
