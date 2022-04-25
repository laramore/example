<?php

namespace App\Models;

use Laramore\Eloquent\BaseModel;
use Laramore\Fields\{
    PrimaryId, ManyToOne
};

class LoopMe2 extends BaseModel
{
    public static function meta($meta)
    {
        $meta->idLoopMe2 = PrimaryId::field();
        $meta->loop = ManyToOne::field()->on(LoopMe1::class);
        $meta->group = ManyToOne::field()->on(Group::class);
    }
}
