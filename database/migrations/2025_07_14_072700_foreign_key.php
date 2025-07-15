<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('service', function (Blueprint $table) {
            $table->foreign('id_main')
                ->references('id_main')
                ->on('main_dealer')
                ->onDelete('cascade');
        });

        Schema::table('variant', function (Blueprint $table){
            $table->foreign('status_id')
                ->references('id_servis')
                ->on('service')
                ->onDelete('cascade');
            
            $table->foreign('id_model')
                ->references('id_model')
                ->on('model_motor')
                ->onDelete('cascade');
        });

        Schema::table('stats', function (Blueprint $table){
            $table->foreign('status_id')
                ->references('id_servis')
                ->on('service')
                ->onDelete('cascade');
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('service', function(Blueprint $table){
            $table->dropForeign(['id_main']);
        });

        Schema::table('variant', function(Blueprint $table){
            $table->dropForeign(['status_id']);
            $table->dropForeign(['id_model']);
        });

        Schema::table('stats', function(Blueprint $table){
            $table->dropForeign(['status_id']);
        });

        Schema::enableForeignKeyConstraints();
    }
};
