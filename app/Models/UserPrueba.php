<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserPrueba extends Authenticatable
{
    use Notifiable;

    protected $table = "users";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'SlpCode',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'commission',
        'GroupCode',
        'Locked',
        'DataSource',
        'UserSign',
        'EmpID',
        'Active',
        'Telephone',
        'Mobil',
        'U_admin',
        'U_branch',
        'U_salt',
        'U_priceList',
        'U_manager',
        'U_export',
        'U_discounts'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
}
