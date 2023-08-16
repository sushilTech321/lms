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
        Schema::create('leaverequests', function (Blueprint $table) {
            $table->id();
            $table->string('name_req');
            $table->string('post');
            $table->string('email');
            $table->string('maristatus');
            $table->string('gender');
            $table->string('joindate');
            $table->string('ltype_req');
            $table->string('lcat_req');
            $table->string('attachments')->nullable();
            $table->date('startdate');
            $table->date('enddate');
            $table->integer('leave_days');
            $table->date('applied_on');
            $table->string('status');
            $table->string('admin_remarks');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaverequests');
    }
};
