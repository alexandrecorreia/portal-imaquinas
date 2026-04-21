<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPagesTable extends Migration
{
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->text('images')->nullable()->after('equipment');
            $table->string('video')->nullable()->after('images');
            $table->string('pdf')->nullable()->after('video');
            $table->text('description')->nullable()->after('pdf');
            $table->text('usability')->nullable()->after('description');
        });
    }

    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['images', 'video', 'pdf', 'description', 'usability']);
        });
    }
}