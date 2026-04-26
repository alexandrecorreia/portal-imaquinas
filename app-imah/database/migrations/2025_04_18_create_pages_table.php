<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            
            // Markdown completo
            $table->text('content'); 
            
            $table->foreignId('equipment_id')
                    ->nullable()
                    ->constrained('equipaments')
                    ->nullOnDelete();            
            
            $table->boolean('is_active')->default(true); // <-- novo campo
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pages');
    }
};