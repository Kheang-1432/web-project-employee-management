<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employee_id'); // Primary key
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->decimal('salary', 10, 2);

            // Foreign key with cascading rules
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')
                  ->references('department_id')
                  ->on('departments')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('employees');
    }
};