<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Livewire\Component;

class ListProject extends Component
{
    public $projects;

    public function mount()
    {
        // Obtiene los proyectos activos.
        $this->projects = Project::where('is_active', true)->get();
    }

    public function render()
    {
        return view('livewire.project.list-project');
    }
}
