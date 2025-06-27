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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // название
            $table->string('cover'); // обложка
            $table->string('category'); // категория, выбирается из списка
            $table->text('short_description')->nullable(); // краткая информация
            $table->enum('status', ['draft', 'pending', 'publish'])->default('draft'); // статус
            $table->string('course_code')->unique(); // код курса
            $table->unsignedBigInteger('teacher_id'); // кто создал

            $table->foreign('teacher_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
