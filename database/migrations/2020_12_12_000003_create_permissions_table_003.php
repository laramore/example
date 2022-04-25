<?php
/**
 * Generated with Laramore on 2020-12-12 12:21:51.
 *
 * @var    Illuminate\Database\Migrations\Migration
 * @model  App\Models\Permission
 */

use Laramore\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable003 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return  void
	 */
	public function up()
	{
		Schema::create("permissions", function (Blueprint $table) {
			$table->increments("id_permission");
			$table->char("name")->length(255);
			$table->unsignedInteger("parent_id")->nullable();

			$table->foreign("parent_id")->references("id_permission")->on("permissions");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return  void
	 */
	public function down()
	{
		Schema::dropIfExists("permissions");
	}
}
