<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class AdminLogReport extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'branch_name',
        'IP',
        'timestamp',
        'date',
        'logout',
    ];

    public $timestamps = false;
    protected $primaryKey = 'ID';
    protected $table = 'admin_log_report';

    public function __construct()
    {

    }
}
