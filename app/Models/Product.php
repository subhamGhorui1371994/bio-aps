<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'VEN_NAME',
        'VEN_CODE',
        'MAKE',
        'PRO_TYPE',
        'CATEGORY',
        'PRO_NAME',
        'ITEM_NO',
        'PART_NO',
        'HSN',
        'GST',
        'LIST_PRICE',
        'DESCRIPTION',
        'YEAR',
        'PRO_ID',
        'TYPES',
    ];

    protected $primaryKey = 'ID';
    protected $table = 'product';
    public $timestamps = false;

    public function __construct()
    {

    }
}
