<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    /**
     * fillable
     * 
     * @var array
     */

    protected $fillable = [
        'nik',
        'name',
        'departement_id',
        'role_id',
        'shift',
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'departement_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }


}
