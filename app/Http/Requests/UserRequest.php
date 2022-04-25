<?php

namespace App\Http\Requests;

use Illuminate\Database\Eloquent\Collection;
use Laramore\Http\Requests\ModelRequest;
use Laramore\Eloquent\FilterMeta;
use Laramore\Http\Filters\{
    Search, OrderBy, Append, Date, Page, PerPage, Trash
};
use App\Models\User;

class UserRequest extends ModelRequest
{
    /**
     * Define the model class used for this request.
     * Not required because it cas be resolved.
     * 
     * @var string
     */
    protected $modelClass = User::class;

    /**
     * Indicate if the user is allowed to access to this request.
     *
     * @return boolean
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Define all filters of this request.
     * 
     * @param FilterMeta $filter
     * @return void
     */
    public static function filter(FilterMeta $meta)
    {
        $meta->append = Append::filter()->fields('name', 'friends');
        $meta->search = Search::filter()->operators('=', 'like');
        $meta->date = Date::filter()->operators('=', '>=', '<')->field('created_at');
        $meta->orderBy = OrderBy::filter()->fields(['firstname', 'lastname', 'name', 'created_at', 'updated_at']);
        
        $meta->page = Page::filter();
        $meta->perPage = PerPage::filter();
        $meta->trash = Trash::filter();
    }

    /**
     * Custom messages
     *
     * @return void
     */
    public function messages() 
    {
        return [
            'email.unique' => 'nope',
            // 'type.forbidden' => 'yes',
        ];
    }
}
