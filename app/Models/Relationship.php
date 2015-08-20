<?php
/**
 * Created by PhpStorm.
 * User: sony
 * Date: 12-08-2015
 * Time: 01:43 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Primary key column name
     * @var string
     */
    protected $primaryKey = 'current_user_id';

    /**
     * The database table used by this model.
     *
     * @var string
     */
    protected $table = 'user_relationship';

}