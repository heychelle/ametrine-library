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
        Schema::table('magazines', function (Blueprint $table) {            
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade') // kalo user kedelete magazine ikut hilang
            ->onUpdate('cascade'); // kalo user ke update magazine ikut hilang
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
