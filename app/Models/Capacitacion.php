<?php


/**
*
* @author GerardoSteven (Steven0110)
*/


namespace App\Models;

use Auth;
use App;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;

class Capacitacion extends Model{
    //
    private $company;

    protected $connection = 'datos';

    protected $table;
    protected $fillable = [
    	'id',
    	'categoria',
    	'titulo',
    	'descripcion',
    	'archivo',
    	'status'
    ];
    public function __construct() {
        $this->table = session('Company').'_capacitations';
    }   
}
