<?php
/**
 * Generated with Laramore on 2020-12-12 12:21:51.
 *
 * @var    Illuminate\Database\Migrations\Migration
 * @model  App\Models\Group
 */

use Laramore\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable006 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return  void
	 */
	public function up()
	{
		Schema::create("groups", function (Blueprint $table) {
			$table->increments("id_group");
			$table->char("name")->length(255)->unique();
			$table->boolean("admin")->default(true);
			$table->unsignedInteger("creator_id");
			$table->unsignedInteger("contact_id")->nullable();
			$table->unsignedInteger("admin_user_id")->nullable()->unique();

			$table->foreign("contact_id")->references("id_contact")->on("contacts");
			$table->foreign("creator_id")->references("id_user")->on("users");
			$table->foreign("admin_user_id")->references("id_user")->on("users");

			$table->unique(["name","admin"]);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return  void
	 */
	public function down()
	{
		Schema::dropIfExists("groups");
	}
}
