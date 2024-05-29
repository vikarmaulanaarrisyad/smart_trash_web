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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aplikasi');
            $table->string('logo_aplikasi');
            $table->string('favicon_aplikasi');
            $table->string('logo_login');
            $table->string('url_aplikasi');
            $table->text('deskripsi_aplikasi');
            $table->text('footer_aplikasi');
            $table->integer('interval')->default(1000);

            $table->string('tipe_aplikasi');
            $table->string('versi_aplikasi');
            $table->string('versi_database');
            $table->string('versi_laravel');
            $table->string('versi_php');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
