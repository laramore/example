<?php
/**
 * Generated with Laramore on 2020-12-12 12:21:51.
 *
 * @var    Illuminate\Database\Migrations\Migration
 * @model  App\Pivots\UserGroup
 */

use Laramore\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserGroupsTable008 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return  void
	 */
	public function up()
	{
		Schema::create("user_groups", function (Blueprint $table) {
			$table->increments("id");
			$table->unsignedInteger("user_id");
			$table->unsignedInteger("group_id")->unique();
			$table->boolean("validated")->default(false);
			$table->datetime("created_at");
			$table->datetime("updated_at");

			$table->foreign("group_id")->references("id_group")->on("groups");
			$table->foreign("user_id")->references("id_user")->on("users");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return  void
	 */
	public function down()
	{
		Schema::dropIfExists("user_groups");
	}
}
