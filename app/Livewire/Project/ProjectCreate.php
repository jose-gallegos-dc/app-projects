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
        'title' => 'required',
        'description' => 'required',
        'image' => 'required|image'
    ];

    public function render()
    {
        return view('livewire.project.project-create')
            ->layout('layouts.app');
    }

    public function resetInputFields()
    {
        $this->title = '';
        $this->slug = '';
        $this->description = '';
        $this->image = null;
        $this->is_active = 0;
    }

    public function storeProject()
    {
        $this->validate();

        try {

            $this->slug = Str::slug($this->title); // Genera el slug desde el título.

            if ($this->image) {
                // Genera un nombre único para la imagen.
                $imageName = uniqid() . '_' . $this->image->getClientOriginalName();

                // Almacena la imagen en la carpeta 'public' con el nombre único.
                $this->image->storeAs('public', $imageName);

                // Asigna el nombre único de la imagen al campo 'image' en la base de datos.
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

            session()->flash('message', 'Proyecto creado con éxito.');

            $this->resetInputFields();
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
        }
    }
}
