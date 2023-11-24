<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectTable extends Component
{
    use WithPagination;

    public function render()
    {
        $projects = Project::orderBy('id', 'DESC')
            ->paginate(5);

        return view('livewire.project.project-table', compact('projects'))
            ->layout('layouts.app');
    }

    public function newProject()
    {
        return redirect()->route('admin.project.create');
    }
}
