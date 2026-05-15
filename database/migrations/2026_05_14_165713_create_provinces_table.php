<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('provinces')->insert([
            ['code' => 'ID-JK', 'name' => 'DKI Jakarta', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'ID-JB', 'name' => 'Jawa Barat', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'ID-JT', 'name' => 'Jawa Tengah', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'ID-JI', 'name' => 'Jawa Timur', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'ID-BT', 'name' => 'Banten', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces');
    }
};
