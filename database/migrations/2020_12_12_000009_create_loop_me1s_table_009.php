<?php
/**
 * Generated with Laramore on 2020-12-12 12:21:51.
 *
 * @var    Illuminate\Database\Migrations\Migration
 * @model  App\Models\LoopMe1
 */

use Laramore\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoopMe1sTable009 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return  void
	 */
	public function up()
	{
		Schema::create("loop_me1s", function (Blueprint $table) {
			$table->increments("id_loop_me1");
			$table->unsignedInteger("loop_id")->nullable();
			$table->unsignedInteger("user_id")->nullable();

			$table->foreign("user_id")->references("id_user")->on("users");
			$table->foreign("loop_id")->references("id_loop_me2")->on("loop_me2s");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return  void
	 */
	public function down()
	{
		Schema::dropIfExists("loop_me1s");
	}
}
