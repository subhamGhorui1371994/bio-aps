<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CompanyDtl extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'CO_NAME',
        'CO_LOGO',
        'EMAIL',
        'URL',
        'PHONE',
        'ADDRESS',
        'STATE',
        'CITY',
        'PIN',
        'COUNTRY',
        'PAN',
        'GSTIN',
    ];

    protected $primaryKey = 'ID';
    protected $table = 'company_dtl';

    public function __construct()
    {

    }
}
