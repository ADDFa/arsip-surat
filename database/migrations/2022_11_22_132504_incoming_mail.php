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
        Schema::create('incoming_mail', function (Blueprint $table) {
            $table->id();
            $table->string('mail_number', 30);
            $table->string('day', 3);
            $table->string('month', 3);
            $table->string('year', 5);
            $table->string('mail_nature', 20);
            $table->string('mail_category', 30);
            $table->string('sender', 40);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incoming_mail');
    }
};
