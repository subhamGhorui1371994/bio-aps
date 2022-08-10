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
        'BRANCH_NAME',
        'BRANCH_CODE',
        'ADDRESS',
        'IFSC_CODE',
        'MICR',
        'SWIFT_CODE',
        'BR_CODE',
        'OP_BL',
        'CL_BL',
        'YEAR',
        'CO_ID',
    ];

    protected $primaryKey = 'ID';
    protected $table = 'bank_dtl';

    public function __construct()
    {

    }

    static public function getListDataTable($order_column, $order_column_by, $limit, $offset, $search): array
    {
        $query = DB::table((new BankDtl)->getTable());

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
