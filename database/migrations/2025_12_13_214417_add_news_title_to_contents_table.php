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
            $table->string('news_title_ru')->nullable()->after('text_ge');
            $table->string('news_title_en')->nullable()->after('text_ge');
            $table->string('news_title_ge')->nullable()->after('text_ge');
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
            $table->dropColumn('news_title_ru');
            $table->dropColumn('news_title_en');
            $table->dropColumn('news_title_ge');
        });
    }
};
