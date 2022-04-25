<?php
/**
 * Generated with Laramore on 2020-12-12 12:21:51.
 *
 * @var    Illuminate\Database\Migrations\Migration
 * @model  App\Models\User
 */

use Laramore\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable000 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return  void
	 */
	public function up()
	{
		Schema::create("users", function (Blueprint $table) {
			$table->increments("id_user");
			$table->integer("number")->nullable();
			$table->decimal("decimal")->nullable();
			$table->binary("binary")->nullable();
			$table->uuid("uuid");
			$table->char("lastname")->length(255);
			$table->char("firstname")->length(255);
			$table->enum("type", ["admin","user","in_creation","banned"])->default("in_creation");
			$table->char("email")->length(255)->unique();
			$table->char("password")->length(60);
			$table->char("url")->length(255);
			$table->json("json");
			$table->datetime("created_at");
			$table->datetime("updated_at")->nullable();
			$table->datetime("deleted_at")->nullable();

			$table->unique(["lastname","firstname"]);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return  void
	 */
	public function down()
	{
		Schema::dropIfExists("users");
	}
}
