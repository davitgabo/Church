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
            $table->text('subheader_ru')->nullable()->after('uri');
            $table->text('subheader_en')->nullable()->after('uri');
            $table->text('subheader_ge')->nullable()->after('uri');
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
            $table->dropColumn('subheader_ru');
            $table->dropColumn('subheader_en');
            $table->dropColumn('subheader_ge');
        });
    }
};
