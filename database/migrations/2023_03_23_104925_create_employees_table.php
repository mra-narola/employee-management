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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 60);
            $table->string('last_name', 60);
            $table->string('email', 60)->unique();
            $table->text('address');

            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

            $table->string('zip_code', 10);
            $table->date('date_of_birth')->nullable();
            $table->date('date_of_hired')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
