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
        Schema::table('books', function (Blueprint $table) {            
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade') //biar kalo user kedelete bukunya ikut hilang
            ->onUpdate('cascade'); //biar kalo user ke update bukunya ikut hilang
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
};
