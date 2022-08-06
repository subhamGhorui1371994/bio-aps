<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class EmployeeDtl extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'DOJ',
        'BRANCH_CODE',
        'BRANCH_NAME',
        'EMPLOYEE_CODE',
        'EMPLOYEE_NAME',
        'ADDRESS',
        'CITY',
        'PIN',
        'STATE',
        'STATE_NAME',
        'COUNTRY',
        'PAN',
        'EMAIL',
        'CONTACT_NO',
        'DOB',
        'DESIGNATION', //spelling error
        'USER',
        'MANAGER',
        'DEPT',
    ];

    protected $primaryKey = 'id';
    protected $table = 'employee_dtl';

    public function __construct()
    {

    }
}
