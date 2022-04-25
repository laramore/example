<?php
/**
 * Generated with Laramore on 2020-12-12 12:21:51.
 *
 * @var    Illuminate\Database\Migrations\Migration
 * @model  App\Pivots\UserFriend
 */

use Laramore\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFriendsTable005 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return  void
	 */
	public function up()
	{
		Schema::create("user_friends", function (Blueprint $table) {
			$table->unsignedInteger("user_id")->unique();
			$table->unsignedInteger("friend_id");

			$table->foreign("friend_id")->references("id_user")->on("users");
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
		Schema::dropIfExists("user_friends");
	}
}
