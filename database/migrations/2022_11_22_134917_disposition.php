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
        Schema::create('disposition', function (Blueprint $table) {
            $table->id();
            $table->string('regarding', 30);
            $table->string('mail_origin', 30);
            $table->string('disposition_destination', 30);
            $table->string('disposition_content', 150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disposition');
    }
};
