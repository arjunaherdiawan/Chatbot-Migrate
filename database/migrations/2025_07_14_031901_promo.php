<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('promo', function (Blueprint $table)
        {
            $table->id();
            $table->string('kategori', 20);
            $table->string('nama_promo', 100);
            $table->text('desk');
            $table->time('start_date');
            $table->time('end_date');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('promo');
    }
};
