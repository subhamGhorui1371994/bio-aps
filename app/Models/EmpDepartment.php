<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class EmpDepartment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'CODE',
        'NAME',
    ];

    protected $primaryKey = 'id';
    protected $table = 'emp_department';

    public function __construct()
    {

    }
}
