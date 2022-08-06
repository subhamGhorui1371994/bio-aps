<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class BankDtl extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'BANK_CODE',
        'BANK_NAME',
        'A/C_HOLDER',
        'A/C_NUMBER',
    ];

    protected $primaryKey = 'id';
    protected $table = 'bank_dtl';

    public function __construct()
    {

    }
}
