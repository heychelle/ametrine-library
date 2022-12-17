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
        Schema::create('magazines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();;
            $table->string('name');
            $table->string('description');
            $table->enum('status', ['0','1','2','3'])
            ->default('0')
            ->comment('0 = Available, 1 = Borrowed, 2 = Due, 3 = Book');            
            $table->date('loan_date')->nullable();
            $table->date('loan_due')->nullable();
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
        Schema::dropIfExists('magazines');
    }
};
