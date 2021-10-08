<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tractor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'trac_codigo', 'trac_marca', 'trac_modelo', 'trac_potencia', 'trac_velocidad', 'trac_articulacion', 'trac_estado'
    ];
}
