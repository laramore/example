<?php

namespace App\Models;

use Laramore\Eloquent\BaseModel;
use Laramore\Fields\{
    PrimaryId, ManyToOne
};

class LoopMe1 extends BaseModel
{
    public static function meta($meta)
    {
        $meta->idLoopMe1 = PrimaryId::field();
        $meta->loop = ManyToOne::field()->on(LoopMe2::class, null, 'loop_relation')->nullable();
        $meta->user = ManyToOne::field()->on(User::class)->nullable();
    }
}
