<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Nomination
 * @package App\Models
 * @version November 6, 2018, 5:11 pm UTC
 *
 * @property string name
 * @property string gender
 * @property string linkedin_url
 * @property string bio
 * @property string business_name
 * @property string reason_for_nomination
 * @property integer no_of_nominations
 * @property boolean is_admin_selected
 * @property boolean is_won
 * @property integer user_id
 * @property integer category_id
 */
class Nomination extends Model
{
    use SoftDeletes;

    public $table = 'nominations';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'gender' => 'string',
        'linkedin_url' => 'string',
        'bio' => 'string',
        'business_name' => 'string',
        'reason_for_nomination' => 'string',
        'no_of_nominations' => 'integer',
        'is_admin_selected' => 'boolean',
        'is_won' => 'boolean',
        'user_id' => 'integer',
        'category_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
