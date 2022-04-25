<?php
/**
 * Generated with Laramore on 2020-12-12 12:21:51.
 *
 * @var    Illuminate\Database\Migrations\Migration
 * @model  App\Models\All
 */

use Laramore\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllsTable001 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return  void
	 */
	public function up()
	{
		Schema::create("alls", function (Blueprint $table) {
			$table->increments("id_all");
			$table->binary("binary");
			$table->text("file");
			$table->char("enum")->length(3);
			$table->enum("model", ["App\\Models\\All","App\\Models\\Contact","App\\Models\\Group","App\\Models\\LoopMe1","App\\Models\\LoopMe2","App\\Models\\Permission","App\\Models\\Role","App\\Models\\User","App\\Pivots\\UserGroup","App\\Pivots\\UserFriend","App\\Pivots\\RolePermission"])->length(25)->nullable();
			$table->enum("owner_type", ["App\\Models\\All","App\\Models\\Contact","App\\Models\\Group","App\\Models\\LoopMe1","App\\Models\\LoopMe2","App\\Models\\Permission","App\\Models\\Role","App\\Models\\User","App\\Pivots\\UserGroup"])->length(21)->nullable();
			$table->integer("owner_id")->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return  void
	 */
	public function down()
	{
		Schema::dropIfExists("alls");
	}
}
