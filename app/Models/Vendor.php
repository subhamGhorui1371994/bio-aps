<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'VENDOR_CODE',
        'VEN_NAME',
        'VEN_DATE',
        'VEN_URL',
        'VEN_PAN',
        'VEN_GST',
        'VEN_ADDRESS',
        'VEN_CITY',
        'VEN_STATE',
        'STATE_NAME',
        'VEN_PIN',
        'VEN_COUNTRY',
        'EMAIL',
        'CONTACT_PERSON',
        'PHONE',
        'REMARKS',
        'MAKE',
        'BR_CODE',
        'USER',
        'SERVER_DATE',
        'MANAGER',
        'MAN_CODE',
        'APPROVAL',
        'GSTIN_DATE',
        'OP_BL',
        'TYPE',
        'CR_PERIOD',
    ];

    protected $primaryKey = 'ID';
    protected $table = 'vendor_dtl';
    public $timestamps = false;

    public function __construct()
    {

    }
}
