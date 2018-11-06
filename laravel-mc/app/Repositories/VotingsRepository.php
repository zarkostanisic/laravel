<?php

namespace App\Repositories;

use App\Models\Votings;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VotingsRepository
 * @package App\Repositories
 * @version November 6, 2018, 5:15 pm UTC
 *
 * @method Votings findWithoutFail($id, $columns = ['*'])
 * @method Votings find($id, $columns = ['*'])
 * @method Votings first($columns = ['*'])
*/
class VotingsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'nomination_id',
        'category_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Votings::class;
    }
}
