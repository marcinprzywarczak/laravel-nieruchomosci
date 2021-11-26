<?php

namespace App\Services\DataTables;

use Carbon\Carbon;
use App\Models\Property;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Services\DataTable;

class PropertyDataTable extends DataTable
{
    const SQL_RAW_FILTER =  [
        'created_at' => "DATE_FORMAT(properties.created_at, '%Y-%m-%d')",
        'updated_at' => "DATE_FORMAT(properties.updated_at, '%Y-%m-%d %H:%i')",
        'deleted_at' => "DATE_FORMAT(properties.deleted_at, '%d-%m-%Y')",
    ];
    public function ajax()
    {
        $datatable = DataTables::eloquent($this->query())
            ->editColumn('created_at', function($row)
            {
                return $row->created_at
                    ?with(new Carbon($row->created_at))->format('Y-m-d')
                    : '';
            })
            ->editColumn('updated_at', function($row)
            {
                return $row->updated_at
                    ?with(new Carbon($row->updated_at))->format('Y-m-d H:i')
                    : '';
            })
            ->editColumn('deleted_at', function($row)
            {
                return $row->deleted_at
                    ?with(new Carbon($row->deleted_at))->format('d-m-Y')
                    : '';
            })
            ->filterColumn('created_at', function($query, $keyword)
            {
                $query->whereRaw(
                    self::SQL_RAW_FILTER['created_at'] . 'LIKE ?' ,
                    ["%$keyword%"]
                );
            })
            ->filterColumn('updated_at', function($query, $keyword)
            {
                $query->whereRaw(
                    self::SQL_RAW_FILTER['updated_at'] . 'LIKE ?' ,
                    ["%$keyword%"]
                );
            })
            ->filterColumn('deleted_at', function($query, $keyword)
            {
                $query->whereRaw(
                    self::SQL_RAW_FILTER['deleted_at'] . 'LIKE ?' ,
                    ["%$keyword%"]
                );
            })
            ->addColumn('action', function($row)
            {
                return '';
            })
            ->rawColumns(['action']);

        return $datatable->make(true);
    }

    public function query()
    {
        $rows = Property::withTrashed()->with('property_type')->select('properties.*');
        return $this->applyScopes($rows);
    }
}