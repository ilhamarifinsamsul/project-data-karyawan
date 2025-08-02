<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * fillable
     * 
     * @var array
     */

    protected $fillable = [
        'name',
    ];

    /**
     * user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */


    public function karyawan()
    {
        return $this->hasMany(Karyawan::class, 'id', 'role_id');
    }

}
