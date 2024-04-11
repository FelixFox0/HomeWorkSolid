<?php

use Illuminate\Database\Migrations\Migration;
//use Illuminate\Database\Schema\Blueprint;
use MongoDB\Laravel\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'mongodb';
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::connection('mongodb')->
            table('users', function (Blueprint $collections) {
                $collections->id('id');
//                $collections->string('name');
                $collections->string('email')->unique();
                $collections->unique('text', 'index_col_text_desc');
                $collections->index(['last_name', 'text']);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('test');
    }
};
