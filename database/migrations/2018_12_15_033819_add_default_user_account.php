<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultUserAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user = new \App\User();
        $user->name = env("DEFAULT_USER_NAME", "Default Name");
        $user->email = env("DEFAULT_EMAIL", "email@example.com");
        $user->email_verified_at = now();
        $user->password = Hash::make(env("DEFAULT_PASSWORD", "password"));

        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $user = \App\User::where('email', env("DEFAULT_EMAIL", "email@example.com"))->first();

        if (!is_null($user)) {
            $user->delete();
        }

    }
}
