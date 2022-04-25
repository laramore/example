<?php

namespace App\Models;

use Laramore\Eloquent\BaseModel;
use Laramore\Fields\{
    PrimaryId, Binary, 
    File, ManyMorphToOne, TextEnum, ModelEnum
};

class All extends BaseModel
{
    public static function meta($meta)
    {
        $meta->idAll = PrimaryId::field();
        // $meta->uuidAll = PrimaryUuid::field();
        $meta->binary = Binary::field();
        $meta->file = File::field();
        $meta->enum = TextEnum::field()->elements(['A', 'B', 'C', 'D', 'E', 
                                                   'AB', 'BC', 'CD', 'DE', 'EA',
                                                   'ABC', 'BCD', 'CDE', 'DEF', 'EFA', 'FAB']);
        $meta->model = ModelEnum::field()->nullable();
        $meta->owner = ManyMorphToOne::field()->nullable()->with();
    }
}
