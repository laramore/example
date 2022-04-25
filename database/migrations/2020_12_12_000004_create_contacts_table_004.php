<?php
/**
 * Generated with Laramore on 2020-12-12 12:21:51.
 *
 * @var    Illuminate\Database\Migrations\Migration
 * @model  App\Models\Contact
 */

use Laramore\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable004 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return  void
	 */
	public function up()
	{
		Schema::create("contacts", function (Blueprint $table) {
			$table->increments("id_contact");
			$table->unsignedInteger("user_id");
			$table->char("name")->length(255);
			$table->char("value")->length(255);

			$table->foreign("user_id")->references("id_user")->on("users");

			$table->unique(["user_id","name"]);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return  void
	 */
	public function down()
	{
		Schema::dropIfExists("contacts");
	}
}
