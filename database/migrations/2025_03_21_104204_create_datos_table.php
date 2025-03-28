<?php

use App\Models\credentials;
use App\Models\User;
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
        Schema::create('datos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(User::class);
            $table->foreingIdFor(credentials::class);
            $table->string('SIP')->nullable();
            $table->string('NIE')->nullable();
            $table->string('NIF')->nullable();
            $table->string('DNI')->nullable();
            $table->string('Pasaporte')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos');
    }
};
