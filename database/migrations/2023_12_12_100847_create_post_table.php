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
        if (!Schema::hasTable('posts')) {
            Schema::create('posts', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained();
                $table->string('job_title');
                $table->string('district')->nullable();
                $table->string('city')->nullable();
                $table->integer('remote')->nullable();
                $table->boolean('can_parttime')->default(false);
                $table->integer('min_salary')->nullable();
                $table->integer('max_salary')->nullable();
                $table->integer('currency_salary')->default(1);
                $table->text('job_description')->nullable();
                $table->text('job_requirement')->nullable();
                $table->text('job_benefit')->nullable();
                $table->date('start_date')->nullable();
                $table->date('end_date')->nullable();
                $table->integer('number_applicants')->nullable();
                $table->integer('status')->default(0);
                $table->string('slug');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
