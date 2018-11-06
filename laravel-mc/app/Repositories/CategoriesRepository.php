<?php

namespace App\Repositories;

use App\Models\Categories;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CategoriesRepository
 * @package App\Repositories
 * @version November 6, 2018, 4:56 pm UTC
 *
 * @method Categories findWithoutFail($id, $columns = ['*'])
 * @method Categories find($id, $columns = ['*'])
 * @method Categories first($columns = ['*'])
*/
class CategoriesRepository extends BaseRepository
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
        return Categories::class;
    }
}
