<?php

namespace App\Models;

use Auth;
use App;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;

class RentaQuotation extends Model
{
    /**
     * Funcion para ejecutar queries a SAP dependiendo del ususario conectado
     *
     * @param String 
     * @return Array 
     */

    private $company;

    protected $connection = 'datos';

    protected $table;
    
    protected $fillable = [
    	'id',
    	'numCotizacion',
    	'numLine',
    	'descripcion',
    	'noparte',
    	'cantidad',
    	'punitario',
    	'monto',
    	'comentarios',
    	'created_at',
    	'updated_at'
    ];

    public function __construct() {
        $this->table = session('Company').'_rentaquotation';
    }

}
