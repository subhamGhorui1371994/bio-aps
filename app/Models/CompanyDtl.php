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

    static public function getListDataTable($order_column, $order_column_by, $limit, $offset, $search): array
    {
        $query = DB::table((new CompanyDtl)->getTable());
        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                $query->Where('name', 'like', '%' . $search . '%');
                $query->Where('phone', 'like', '%' . $search . '%');
            });
        }
        $query->select('*')->orderBy($order_column, $order_column_by);
        $recordsTotal = $query->count();
        $data = $query->skip($offset)->take($limit)->where('CO_LOGO', '!=', '')->get()->toArray();
        return ['recordsTotal' => $recordsTotal, 'data' => $data];
    }
    static public function getListSupportDataTable($order_column, $order_column_by, $limit, $offset, $search): array
    {
        $query = DB::table((new CompanyDtl)->getTable());
        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                $query->Where('name', 'like', '%' . $search . '%');
                $query->Where('phone', 'like', '%' . $search . '%');
            });
        }
        $query->select('*')->orderBy($order_column, $order_column_by);
        $recordsTotal = $query->count();
        $data = $query->skip($offset)->take($limit)->where('CO_LOGO', '=', '')->get()->toArray();
        return ['recordsTotal' => $recordsTotal, 'data' => $data];
    }
}
