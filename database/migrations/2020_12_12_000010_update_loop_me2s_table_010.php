<?php
/**
 * Generated with Laramore on 2020-12-12 12:21:51.
 *
 * @var    Illuminate\Database\Migrations\Migration
 * @model  App\Models\LoopMe2
 */

use Laramore\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateLoopMe2sTable010 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return  void
	 */
	public function up()
	{
		Schema::table("loop_me2s", function (Blueprint $table) {
			$table->foreign("group_id")->references("id_group")->on("groups");
			$table->foreign("loop_id")->references("id_loop_me1")->on("loop_me1s");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return  void
	 */
	public function down()
	{
		Schema::table("loop_me2s", function (Blueprint $table) {
			$table->dropForeign("loop_me2s_group_id_foreign");
			$table->dropForeign("loop_me2s_loop_id_foreign");
		});
	}
}
