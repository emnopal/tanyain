<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanyaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->longText('isi');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate("cascade");
            $table->foreign('tag_id')->references('id')->on('tag')->onDelete('cascade')->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
