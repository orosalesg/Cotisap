<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CP extends Model
{
    //
    protected $table = 'cp';
    protected $primaryKey = 'codigo_postal';
    protected $fillable = [
    	'codigo_postal',
    	'colonia',
    	'municipio',
    	'estado'
    ];
}
