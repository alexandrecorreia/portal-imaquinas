<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['images', 'video', 'pdf', 'description', 'usability']);
        });
    }

    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->json('images')->nullable();
            $table->string('video')->nullable();
            $table->string('pdf')->nullable();
            $table->text('description')->nullable();
            $table->text('usability')->nullable();
        });
    }
};