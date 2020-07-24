<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepublicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('republics', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("street");
            $table->integer("street_number")->default(0);
            $table->string("city");
            $table->string("state");
            $table->integer("cep");
            $table->float("rating")->default(NULL);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string("description")->nullable();
        });

        Schema::table('republics', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('republics');
    }
}
