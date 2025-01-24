<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create("perfils", function (Blueprint $table) {
            $table->id();
            $table->string("direccion")->nullable();
            $table->string("telefono")->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists("perfils");
    }
};
