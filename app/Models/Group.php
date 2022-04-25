<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laramore\Eloquent\BaseModel;
use Laramore\Fields\{
    PrimaryId, Char, Boolean, ManyToOne, OneToOne
};

class Group extends BaseModel
{
    use HasFactory;

    public static function meta($meta)
    {
        $meta->idGroup = PrimaryId::field();
            // ->attname('id');
        $meta->name = Char::field()->unique();
        $meta->admin = Boolean::field()->default(true);
        $meta->creator = ManyToOne::field()->on(User::class)
                                        //    ->with()
                                           ->reversedName('created_groups');
        $meta->contact = ManyToOne::field()->on(Contact::class)->nullable();
        $meta->admin_user = OneToOne::field()->on(User::class)->reversedName('admin_group')->nullable();

        $meta->unique(['name', 'admin']);

        // $meta->creator->getReversedField()->required();
    }
}
