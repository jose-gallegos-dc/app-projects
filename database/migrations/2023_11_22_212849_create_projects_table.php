<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title', 64)->unique()->comment('Título del proyecto');
            $table->string('slug', 255)->unique()->comment('Url de búsqueda del proyecto');
            $table->text('description')->comment('Descripción del proyecto');
            $table->string('image', 255)->unique()->comment('Nombre de la imagen asociada al proyecto del proyecto');
            $table->boolean('is_active')->default(false)->comment('1:Publicado/0:Borrador');
            $table->unsignedBigInteger('created_by_user_id')->nullable()->comment('Id del usuario que creó este proyecto');
            $table->unsignedBigInteger('updated_by_user_id')->nullable()->comment('Id del usuario que editó este proyecto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
