<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table): void {
            $table->id();
            $table->string('requester_name', 120);
            $table->string('requester_email');
            $table->string('category', 60);
            $table->string('priority', 20);
            $table->string('subject', 180);
            $table->text('description');
            $table->string('status', 30)->default('Open');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};

