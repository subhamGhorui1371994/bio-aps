<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class UserPermissions extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'EMP_CODE',
        'STATUS',
        'PURCHASE',
        'SALES',
        'PAYMENT',
        'QUOTATION',
        'ACCOUNTS',
        'REPORT',
        'ADDS',
        'BRANCH',
    ];

    /* Auto Increment Off */
    protected $primaryKey = 'ID';
    protected $table = 'user_permissions';

    public function __construct()
    {

    }

}
