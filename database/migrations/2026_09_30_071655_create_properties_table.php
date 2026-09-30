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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('location');
            $table->decimal('price');
            $table->integer('max_people_allowed');
            $table->foreignid('user_id')->constrained('users');
            $table->timestamps();
        });

            Schema::table('users', function(Blueprint $table){
                $table->string('role')->default('admin');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            Schema::drop('properties');
        });
    }
};
