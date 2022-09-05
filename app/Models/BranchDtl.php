<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class BranchDtl extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'EMPLOYEE_CODE',
        'BRANCH_CODE',
        'BRANCH_NAME',
        'USERNAME',
        'LOGIN_PASSWORD',
        'EMAIL',
        'TXT_PASS',
        'BR_DATE',
        'BR_CONTACT_PERSON',
        'BR_PHONE',
        'BR_ADDRESS',
        'BR_COUNTRY',
        'BR_STATE',
        'BR_CITY',
        'BR_PIN',
        'BR_GST',
        'STAMP',
        'PREFIX',
        'ADMINorBRANCH',
    ];

    protected $primaryKey = 'ID';
    protected $table = 'branch_dtl';
    public $timestamps = false;

    public function __construct()
    {

    }
}
