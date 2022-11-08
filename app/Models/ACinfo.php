<?php

namespace App\Models;

use Auth;
use App;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;

class ACinfo extends Model
{

    private $company;

    protected $connection = 'datos';

    protected $table;
    
    protected $fillable = [
    	'id',
        'client_id',
        'client_secret',
        'access_token',
        'created_at',
        'updated_at'
    ];

    public function __construct() {
        $this->table = session('Company').'_acinfo';
    }
    
}
