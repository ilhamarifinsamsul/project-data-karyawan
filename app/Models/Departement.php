<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    /**
     * fillable
     * 
     * @var array
     */

    protected $table = 'departement';
    
    protected $fillable = [
        'name'
    ];
    
    public function karyawan()
    {
        return $this->hasMany(Karyawan::class, 'departement_id', 'id');
    }


}
