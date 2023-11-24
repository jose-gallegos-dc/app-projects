<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class ProjectCreate extends Component
{
    use WithFileUploads;

    public $title, $slug, $description, $image, $is_active;

    protected $rules = [
        'title' => 'required|unique:projects',
        'description' => 'required',
        'image' => 'required|image'
    ];

    public function render()
    {
        return view('livewire.project.project-create')
            ->layout('layouts.app');
    }

    public function storeProject()
    {
        $this->validate();

        try {

            $this->slug = Str::slug($this->title); // Genera el slug desde el título.

            if ($this->image) {
                $imageName = uniqid() . '_' . $this->image->getClientOriginalName();
                $this->image->storeAs('public', $imageName);
                $this->image = $imageName;
            }

            $this->is_active = $this->is_active  ? 1 : 0;

            Project::create([
                'title' => $this->title,
                'slug' => $this->slug,
                'description' => $this->description,
                'image' => $this->image,
                'is_active' => $this->is_active,
            ]);

            return redirect()->route('admin.projects')->with('message', 'Proyecto creado con éxito.');
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
        }
    }
}
