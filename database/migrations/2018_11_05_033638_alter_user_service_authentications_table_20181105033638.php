<?php

use Illuminate\Database\Schema\Blueprint;
use LaravelRocket\Foundation\Database\Migration;

class AlterUserServiceAuthenticationsTable20181105033638 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::table('user_service_authentications', function($table) {
            /** @var  $table \Illuminate\Database\Schema\Blueprint */
            $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::table('user_service_authentications', function($table) {
            /** @var  $table \Illuminate\Database\Schema\Blueprint */
            $table->bigInteger('user_id')->after('id');
        });
    }
}
