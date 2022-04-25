<?php

namespace App\Pivots;

use Laramore\Eloquent\BasePivot;
use Laramore\Fields\{
    PrimaryId, ManyToOne, Boolean
};
use App\Models\{
    User, Group
};

class UserGroup extends BasePivot
{
    public static function meta($meta)
    {
        $meta->id = PrimaryId::field();
        $meta->user = ManyToOne::field()->on(User::class);
        $meta->group = ManyToOne::field()->on(Group::class);
        $meta->validated = Boolean::field()->default(false);

        $meta->useTimestamps(true);
    }
}
