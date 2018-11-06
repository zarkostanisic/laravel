<?php

namespace App\Repositories;

use App\Models\Categry;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CategryRepository
 * @package App\Repositories
 * @version November 6, 2018, 5:05 pm UTC
 *
 * @method Categry findWithoutFail($id, $columns = ['*'])
 * @method Categry find($id, $columns = ['*'])
 * @method Categry first($columns = ['*'])
*/
class CategryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Categry::class;
    }
}
