<?php

namespace App\Models;

use Laramore\Eloquent\BaseModel;
use Laramore\Fields\{
    PrimaryId, ManyToOne, Char
};

class Contact extends BaseModel
{
    public static function meta($meta)
    {
        $meta->idContact = PrimaryId::field();
        $meta->user = ManyToOne::field()->on(User::class);
        $meta->name = Char::field();
        $meta->value = Char::field();

        $meta->unique([$meta->user, $meta->name]);
    }
}
