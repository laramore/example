<?php
/**
 * Generated with Laramore on 2020-12-12 12:21:51.
 *
 * @var    Illuminate\Database\Migrations\Migration
 * @model  App\Models\Role
 */

use Laramore\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable002 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return  void
	 */
	public function up()
	{
		Schema::create("roles", function (Blueprint $table) {
			$table->increments("id_role");
			$table->char("name")->length(255)->unique();
			$table->char("slug")->length(255)->unique();
			$table->unsignedInteger("parent_id")->nullable();

			$table->foreign("parent_id")->references("id_role")->on("roles");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return  void
	 */
	public function down()
	{
		Schema::dropIfExists("roles");
	}
}
