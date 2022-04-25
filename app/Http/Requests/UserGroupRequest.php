<?php
/**
 * Generated with Laramore on 2019-12-18 12:34:35.
 *
 * @var Laramore\Http\Requests\ModelRequest
 */

namespace App\Http\Requests;

use Laramore\Http\Requests\RelatedModelRequest;

class UserGroupRequest extends RelatedModelRequest
{
    /**
     * Based model used to resolve the model of this request.
     *
     * @var LaramoreModel
     */
    protected $baseModelClass = \App\Models\User::class;

    /**
     * Define the model class used for this request.
     * 
     * @var string
     */
    protected $modelClass = \App\Models\Group::class;

    /**
     * Define the model class used for this request.
     * 
     * @var string
     */
    protected $modelRelation = 'groups';

    /**
     * Indicate if the user is allowed to access to this request.
     *
     * @return boolean
     */
    public function authorize(): bool
    {
        return true;
    }
}
