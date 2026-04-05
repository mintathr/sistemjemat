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
        Schema::table('members', function (Blueprint $table) {
            $table->string('status_nikah', 2)->nullable()->change();
            $table->string('status_aktif')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->enum('status_nikah', ['S', 'B'])->nullable()->change();
            $table->boolean('status_aktif')->default(true)->change();
        });
    }
};
