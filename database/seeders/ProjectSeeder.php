<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 3; $i++) {
            $title = 'Proyecto ' . $i;
            $slug = 'proyecto-' . $i;

            $description = $faker->paragraph;

            // Genera una imagen ficticia con Faker.
            $imagePath = $faker->image('public/storage', 640, 480, null, false);

            // Obtiene solo el nombre del archivo de la ruta generada por Faker.
            $imageName = basename($imagePath);

            // Insertar datos del proyecto en la base de datos
            Project::create([
                'title' => $title,
                'slug' => $slug,
                'description' => $description,
                'image' => $imageName,
                'is_active' => $faker->boolean,
                'created_by_user_id' => 2,
            ]);
        }
    }
}
