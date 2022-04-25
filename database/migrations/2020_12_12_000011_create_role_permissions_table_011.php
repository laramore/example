<?php
/**
 * Generated with Laramore on 2020-12-12 12:21:51.
 *
 * @var    Illuminate\Database\Migrations\Migration
 * @model  App\Pivots\RolePermission
 */

use Laramore\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolePermissionsTable011 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return  void
	 */
	public function up()
	{
		Schema::create("role_permissions", function (Blueprint $table) {
			$table->unsignedInteger("role_id")->unique();
			$table->unsignedInteger("permission_id");

			$table->foreign("permission_id")->references("id_permission")->on("permissions");
			$table->foreign("role_id")->references("id_role")->on("roles");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return  void
	 */
	public function down()
	{
		Schema::dropIfExists("role_permissions");
	}
}
