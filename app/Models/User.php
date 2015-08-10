<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
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
    protected $primaryKey = '_id';

    /**
     * The database table used by this model.
     *
     * @var string
     */
    protected $table = 'users';

}
