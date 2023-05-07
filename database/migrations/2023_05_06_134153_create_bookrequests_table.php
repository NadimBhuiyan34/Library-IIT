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
        Schema::create('bookrequests', function (Blueprint $table) {
             $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('book_id')->nullable();
            $table->date('return_date')->nullable();
            $table->date('approved_date')->nullable();
            $table->date('issue_date')->nullable();
            $table->string('status',100)->nullable();
            $table->string('reissue',100)->nullable();
            $table->string('approved_id',100)->nullable();
            $table->integer('fine')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('book_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookrequests');
    }
};
