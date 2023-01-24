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
        Schema::create('english_contents', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->string('text_ge');
            $table->string('section')->nullable();
            $table->string('page')->nullable();
            $table->string('uri')->nullable();
            $table->string('visibility')->nullable();
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
        Schema::dropIfExists('english_contents');
    }
};
