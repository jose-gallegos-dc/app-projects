<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class ProjectEdit extends Component
{
    use WithFileUploads;

    public $project, $title, $slug, $description, $image, $image_name, $is_active;

    protected function rules()
    {
        return [
            'title' => 'required|unique:projects,title,' . $this->project->id,
            'description' => 'required',
            'image' => 'nullable|image',
        ];
    }

    public function mount($id)
    {
        // Devuelve el proyecto activo con base en el valor del slug.
        $this->project = Project::where('id', $id)
            ->first();

        // Verificar si el usuario tiene el rol de administrador
        $isAdmin = Auth::user()->hasRole('admin');

        $canEdit = $isAdmin || $this->project->created_by_user_id === Auth::id();

        if (!$canEdit) {
            abort(403, 'No tienes permisos para editar este proyecto.');
        }

        $this->title = $this->project->title;
        $this->description = $this->project->description;
        $this->is_active = $this->project->is_active;
        $this->image_name = $this->project->image;
    }

    public function render()
    {
        return view('livewire.project.project-edit')
            ->layout('layouts.app');
    }

    public function updateProject()
    {
        $this->validate();

        try {

            $this->slug = Str::slug($this->title); // Genera el slug desde el título.

            if ($this->image) {
                $imageName = uniqid() . '_' . $this->image->getClientOriginalName();
                $this->image->storeAs('public', $imageName);
                $this->image = $imageName;
            } else {
                $this->image = $this->project->image;
            }

            $this->is_active = $this->is_active  ? 1 : 0;

            $this->project->update([
                'title' => $this->title,
                'slug' => $this->slug,
                'description' => $this->description,
                'image' => $this->image,
                'is_active' => $this->is_active,
            ]);

            return redirect()->route('admin.projects')->with('message', 'Proyecto actualizado con éxito.');
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
        }
    }

    public function delete()
    {
        $this->project->delete();
        return redirect()->route('admin.projects')->with('message', 'Proyecto eliminado con éxito.');
    }
}
