<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content'); // Markdown completo
            $table->string('equipment')->nullable(); // Ex.: Impressoras, Envernizadoras
            $table->text('images')->nullable(); // Lista de imagens (ex.: img1.jpg, img2.jpg)
            $table->string('video')->nullable(); // Nome do vídeo (ex.: video.mp4)
            $table->string('pdf')->nullable(); // Nome do PDF (ex.: catalogo.pdf)
            $table->text('description')->nullable(); // Descrição extraída do Markdown
            $table->text('usability')->nullable(); // Usabilidade extraída do Markdown
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pages');
    }
}