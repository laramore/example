<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laramore\Traits\Model\HasLaramore;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laramore\Fields\{
    PrimaryUuid, Char, Email, Password, Foreign
};

class User extends Authenticatable
{
    use Notifiable, HasLaramore;

    protected static function __meta($meta, $fields)
    {
        $fields->id = PrimaryUuid::field();
        $fields->name = Char::field()->length(80);
        $fields->email = Email::field()->unique()->cdn('laramore.org');
        $fields->password = Password::field();
        $fields->group = Foreign::field()->on(Group::class)->nullable();

        $meta->useTimestamps();
    }
}
