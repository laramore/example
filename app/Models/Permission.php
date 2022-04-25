<?php

namespace App\Models;

use Laramore\Eloquent\BaseModel;
use Laramore\Fields\{
    PrimaryId, Char, ManyToOne
};

class Permission extends BaseModel
{
    public static function meta($meta)
    {
        $meta->idPermission = PrimaryId::field();
        $meta->name = Char::field();
        $meta->parent = ManyToOne::field()->onSelf();
    }
}
