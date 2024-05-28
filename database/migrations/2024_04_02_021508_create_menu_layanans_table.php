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
        Schema::create('menu_layanans', function (Blueprint $table) {
            $table->id();
            $table->integer('layanan_id')->length(5)->unsigned();
            $table->text('link_sso');
            $table->text('link_website');
            $table->enum('status', ['aktif', 'tidak-aktif']);
            $table->bigInteger('visit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_layanans');
    }
};
