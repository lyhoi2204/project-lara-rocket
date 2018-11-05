<?php

use Illuminate\Database\Schema\Blueprint;
use LaravelRocket\Foundation\Database\Migration;

class AlterFilesTable20181105033638 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::table('files', function($table) {
            /** @var  $table \Illuminate\Database\Schema\Blueprint */
            $table->string('dominant_color')->default('')->after('thumbnails');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::table('files', function($table) {
            /** @var  $table \Illuminate\Database\Schema\Blueprint */
            $table->dropColumn('dominant_color');
        });
    }
}
