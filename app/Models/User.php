<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laramore\Eloquent\BaseUser;
use Laramore\Traits\Eloquent\SoftDeletes;
use Laramore\Contracts\Eloquent\{
    LaramoreModel, LaramoreMeta
};
use Laramore\Fields\{
    PrimaryId, Enum, Name, Email, Password, Uuid, Integer, Json, Decimal, Binary, Https, ManyToMany, Relation
};
use Laramore\Traits\Factory\HasFactory;


class User extends BaseUser implements LaramoreModel
{
    use Notifiable, HasFactory, SoftDeletes;

    const TYPES = ['admin' => 'Administrator', 'user' => 'User', 'in_creation' => 'In creation', 'banned' => 'Banned user'];

    public static function meta(LaramoreMeta $meta)
    {
        $meta->idUser = PrimaryId::field();
        $meta->number = Integer::field()->notZero()->nullable();
        $meta->decimal = Decimal::field()->notZero()->nullable();
        $meta->binary = Binary::field()->nullable();
        $meta->uuid = Uuid::field()->autoGenerate();
        $meta->name = Name::field()->maxLength(200)->append()->unique();
        $meta->type = Enum::field()->elements(static::TYPES)
                                   ->default('in_creation');
        $meta->email = Email::field()->unique()
                                     ->allowedDomain('laramore.io');
        $meta->password = Password::field();
        $meta->url = Https::field()->fixable();

        $meta->json = Json::field()->default(['a']);   
        // $meta->data = KeyValue::field();

        $meta->groups = ManyToMany::field()->on(Group::class)
                                           ->usePivot()
                                           ->nullable()
                                           ->unique();

        $meta->supGroups = Relation::field()->basedOn($meta->groups)
                                            ->when(function ($query, $model) {
                                                return $query->whereIdGroupSup($model->id_user + 1);
                                            });
        
        $meta->friends = ManyToMany::field()->onSelf()
                                            ->nullable()
                                            ->unique();

        // $meta->position = Position3D::field()->nullable();

        // $meta->useRights(Role::class);
        $meta->useTimestamps();
        $meta->useDeleteTimestamp();
    }
}
