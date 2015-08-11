<?php
/**
 * Created by PhpStorm.
 * User: sony
 * Date: 12-08-2015
 * Time: 01:43 AM
 */

namespace App\Models;


class Relationship
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
    protected $primaryKey = 'current_userid';

    /**
     * The database table used by this model.
     *
     * @var string
     */
    protected $table = 'user_relationship';

}