<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->string('telephone_number', 30);
            $table->string('email', 30);
            $table->string('address', 30);
            $table->string('head_master', 30);
            $table->string('nip', 30);
        });
    }

    public function down()
    {
        Schema::dropIfExists('about');
    }
};
