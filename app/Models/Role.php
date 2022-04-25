<?php

namespace App\Models;

use Laramore\Eloquent\BaseModel;
use Laramore\Fields\{
    PrimaryId, Char, ManyToOne, ManyToMany, Slugify
};

class Role extends BaseModel
{
    public static function meta($meta)
    {
        $meta->idRole = PrimaryId::field();
        $meta->name = Char::field()->unique();
        $meta->slug = Slugify::field()->basedOn('name');
        $meta->parent = ManyToOne::field()->onSelf();
        $meta->permissions = ManyToMany::field()->nullable()->on(Permission::class)->unique();
    }
}
