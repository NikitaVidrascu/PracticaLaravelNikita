<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table("alumnos", function (Blueprint $table) {
            $table->foreignId("curso_id")->constrained()->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("alumnos", function (Blueprint $table) {
            $table->dropForeign(["curso_id"]);
            $table->dropColumn("curso_id");
        });
    }
};
