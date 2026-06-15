<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('consultas', function ($table) {
        $table->boolean('leida')->default(false);
    });
}

    public function down(): void
    {
        Schema::table('consultas', function (Blueprint $table) {

            $table->dropColumn('leida');

        });
    }
};