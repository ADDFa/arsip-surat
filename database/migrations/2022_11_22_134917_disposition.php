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
        Schema::create('dispositions', function (Blueprint $table) {
            $table->id();
            $table->string('regarding_mail', 30);
            $table->string('from_unit', 30);
            $table->string('disposition_destination', 30);
            $table->string('disposition_content', 150);
            $table->foreignId('user_id')->constrained('users')->onDelete('CASCADE');
            $table->foreignId('incoming_mail_id')->constrained('incoming_mails')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispositions');
    }
};
