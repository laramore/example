<?php
/**
 * Generated with Laramore on 2019-12-18 12:34:35.
 *
 * @var Laramore\Http\Requests\ModelRequest
 */

namespace App\Http\Requests;

use Laramore\Http\Requests\ModelRequest;

class ContactRequest extends ModelRequest
{
    /**
     * Define the model class used for this request.
     * 
     * @var string
     */
    protected $modelClass = \App\Models\Contact::class;

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
