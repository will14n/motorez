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
        Schema::create('optionals', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        DB::table('optionals')->insert(
            array(
                [
                    'title' => 'Ar Condicionado',
                ],
                [
                    'title' => 'Direcao Hidraulica',
                ],
                [
                    'title' => 'Faróis de LED',
                ],
                [
                    'title' => 'Teto Solar',
                ],
                [
                    'title' => 'Travas elétricas',
                ],
                [
                    'title' => 'Vidros Eletricos',
                ],
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('optionals');
    }
};
