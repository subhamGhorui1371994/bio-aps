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

    protected $primaryKey = 'ID';
    protected $table = 'employee_dtl';

    public function __construct()
    {

    }

    static public function getListDataTable($order_column, $order_column_by, $limit, $offset, $search): array
    {
        $query = DB::table((new EmployeeDtl)->getTable());

        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                $query->Where('name', 'like', '%' . $search . '%');
                $query->Where('phone', 'like', '%' . $search . '%');
            });
        }

        $query->select('*')->orderBy($order_column, $order_column_by);

        $recordsTotal = $query->count();

        $data = $query->skip($offset)->take($limit)->get()->toArray();

        return ['recordsTotal' => $recordsTotal, 'data' => $data];
    }
}
