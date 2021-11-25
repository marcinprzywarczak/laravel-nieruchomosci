<?php

namespace App\Services\DataTables;

use Carbon\Carbon;
use App\Models\Property;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Services\DataTable;

class PropertyDataTable extends DataTable
{
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
            ->addColumn('action', function($row)
            {
                return '';
            })
            ->rawColumns(['action']);

        return $datatable->make(true);
    }

    public function query()
    {
        $rows = Property::withTrashed();
        return $this->applyScopes($rows);
    }
}