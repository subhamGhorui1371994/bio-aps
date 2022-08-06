<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class BankList extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'bank_name',
    ];

    protected $primaryKey = 'id';
    protected $table = 'bank_list';

    public function __construct()
    {

    }
}
