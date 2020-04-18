<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'country';

    /**
     * The database primary key value.
     *
     * @var string
     */

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['name','name_gr','name_ru','name_he', 'code'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = ['created_at', 'updated_at'];

    /**
     * boot
     */
    protected static function boot()
    {
        parent::boot();
    }

}
