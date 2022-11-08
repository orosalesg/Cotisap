<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliver extends Model
{
    use HasFactory;

    private $company;

    protected $connection = 'datos';

    protected $table;

    protected $fillable = [
    	'id',
    	'numdelivery',
    	'idvendedor',
    	'razonCliente',
    	'nombreCliente',
    	'direccionCliente',
    	'telefonoCliente',
    	'correoCliente',
        'created_at',
    	'updated_at'
    ];

    public function __construct() {
        $this->table = session('Company').'_deliveries';
    } 
}
