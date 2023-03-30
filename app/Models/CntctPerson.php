<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CntctPerson extends Model
{
    use HasFactory;

    private $company;

    protected $connection = 'datos';

    protected $table;
    
    protected $fillable = [
        'id_customer',
    	'nombre',
    	'email',
    	'phone',
    ];

    public function __construct() {
        $this->table = session('Company').'_cntctperson';
    }
}
