<?php

use Illuminate\Database\Schema\Blueprint;
use LaravelRocket\Foundation\Database\Migration;

class CreateAdminUserNotificationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return  void
	 */
	public function up()
	{
		Schema::create('admin_user_notifications', function(Blueprint $table) {
			$table->bigIncrements('id');

			$table->unsignedBigInteger('admin_user_id')->default(0);
			$table->string('type')->default('');
			$table->text('data')->nullable();
			$table->unsignedInteger('notified_at')->default(0);
			$table->unsignedInteger('read_at')->default(0);

            $table->timestamps();

			$table->index(['admin_user_id'], 'fk_admin_user_notifications_admin_users1_idx');

		});

		$this->updateTimestampDefaultValue('admin_user_notifications', ['updated_at'], ['created_at']);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return  void
	 */
	public function down()
	{
		Schema::dropIfExists('admin_user_notifications');
	}
}
