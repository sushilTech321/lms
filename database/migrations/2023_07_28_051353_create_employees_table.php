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
            $table->string('emp_name');
            $table->string('emp_post');
            $table->string('emp_maristatus');
            $table->string('emp_gender');
            $table->date('emp_joinDate');
            // $table->string('emp_email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('usertype');
            // $table->string('emp_passwd');
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
