<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectTable extends Component
{
    use WithPagination;

    public function render()
    {
        // Verificar si el usuario tiene el rol de administrador.
        $isAdmin = Auth::user()->hasRole('admin');

        if ($isAdmin) {
            $projects = Project::orderBy('id', 'DESC')->paginate(5);
        } else {
            $userId = Auth::id();
            $projects = Project::where('created_by_user_id', $userId)->orderBy('id', 'DESC')->paginate(5);
        }

        return view('livewire.project.project-table', compact('projects'))
            ->layout('layouts.app');
    }

    public function newProject()
    {
        return redirect()->route('admin.project.create');
    }

    public function redirectEdit($id)
    {
        $this->redirect(route('admin.project.edit', ['id' => $id]));
    }
}
