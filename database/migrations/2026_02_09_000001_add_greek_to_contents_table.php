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
        Schema::table('contents', function (Blueprint $table) {
            $table->text('text_gr')->after('text_ru')->nullable();
            $table->string('news_title_gr')->after('news_title_ru')->nullable();
            $table->string('subheader_gr')->after('subheader_ru')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contents', function (Blueprint $table) {
            $table->dropColumn(['text_gr', 'news_title_gr', 'subheader_gr']);
        });
    }
};
