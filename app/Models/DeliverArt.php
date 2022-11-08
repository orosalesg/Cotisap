<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverArt extends Model
{
    use HasFactory;

    private $company;

    protected $connection = 'datos';

    protected $table;

    protected $fillable = [
    	'id',
    	'numdelivery',
        'numLine',
    	'cantidad',
    	'descripcion',
    	'modelo',
    	'noserie',
        'created_at',
    	'updated_at'
    ];

    public function __construct() {
        $this->table = session('Company').'_artdeliveries';
    } 
}
