<?php

namespace App\Repositories;

use App\Models\Nominate;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NominateRepository
 * @package App\Repositories
 * @version November 6, 2018, 5:08 pm UTC
 *
 * @method Nominate findWithoutFail($id, $columns = ['*'])
 * @method Nominate find($id, $columns = ['*'])
 * @method Nominate first($columns = ['*'])
*/
class NominateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'gender',
        'linkedin_url',
        'bio',
        'business_name',
        'reason_for_nomination',
        'no_of_nominations',
        'is_admin_selected',
        'is_won',
        'user_id',
        'category_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Nominate::class;
    }
}
