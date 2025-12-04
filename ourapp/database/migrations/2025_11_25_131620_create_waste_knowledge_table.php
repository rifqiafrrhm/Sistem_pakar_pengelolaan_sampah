<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('waste_knowledge', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_sampah');
            $table->string('icon');
            $table->json('ciri_ciri');
            $table->text('pengelolaan');
            $table->text('deskripsi');
            $table->json('langkah_langkah');
            $table->string('kategori');
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('waste_knowledge');
    }
};
