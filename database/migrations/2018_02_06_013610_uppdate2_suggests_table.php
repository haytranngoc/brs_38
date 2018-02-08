<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Uppdate2SuggestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suggests', function ($table) {
            $table->unsignedInteger('book_id')->after('user_id');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->tinyInteger('status')->default(0)->after('book_id');
            $table->unsignedInteger('owner_id')->nullable()->after('book_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suggests', function ($table) {
            $table->dropForeign(['book_id']);
            $table->dropColumn('book_id');
            $table->dropColumn('status');
            $table->dropColumn('owner_id');
        });
    }
}
