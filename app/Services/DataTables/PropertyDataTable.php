<?php

namespace App\Services\DataTables;

use Carbon\Carbon;
use App\Models\Property;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Services\DataTable;
use Illuminate\View\ComponentAttributeBag;

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
                return $this->getActionButtons($row);
            })
            ->rawColumns(['action']);

        return $datatable->make(true);
    }

    public function query()
    {
        $rows = Property::withTrashed()->with('property_type')->select('properties.*');
        return $this->applyScopes($rows);
    }

    private function getActionButtons(Property $property): string
    {
        $buttons = '<div class="btn-group" role="group" aria-label="action buttons">';
        $buttons .= $this->getOffersButton($property);
        $buttons .= $this->getEditButton($property);
        $buttons .= $this->getDestroyButton($property);
        $buttons .= $this->getRestoreButton($property);
        $buttons .= '</div>';
        return $buttons;
    }

    private function getEditButton(Property $property): string
    {
        if(isset($property->deleted_at))
        {
            return '';
        }
        
        return view('components.datatables.action-link', [
            'slot' => '<i class="bi-pencil"></i>',
            'attributes' => new ComponentAttributeBag([
                'url' => route('properties.edit', $property),
                'title' =>  __('translations.properties.label.edit'),
                'class' => 'btn btn-primary'
            ])
        ])->render();
    }

    private function getOffersButton(Property $property): string
    {
        
        return view('components.datatables.action-link', [
            'slot' => 'Oferty',
            'attributes' => new ComponentAttributeBag([
                'url' => route('properties.offers', $property),
                'title' =>  __('translations.properties.label.offers'),
                'class' => 'btn btn-secondary'
            ])
        ])->render();
    }

    private function getDestroyButton(Property $property): string
    {
        if(isset($property->deleted_at))
        {
            return '';
        }
        return view('components.datatables.confirm', [
            'slot' => '<i class="bi bi-trash"></i>',
            'attributes' => new ComponentAttributeBag([
                'action' => route('properties.destroy', $property),
                'method' => 'DELETE',
                'confirm-text' => __('translations.buttons.yes'),
                'confirm-class' => 'btn btn-danger me-2',
                'cancel-text' => __('translations.buttons.no'),
                'cancel-class' => 'btn btn-secondary ms-2',
                'icon' => 'question',
                'message' => __('translations.properties.label.destroy-question' ,[
                    'address' => $property->address
                ]),
                'button-class' => 'btn btn-danger',
                'button-title' => __('translations.properties.label.destroy')
            ])
        ])->render();
    }

    private function getRestoreButton(Property $property): string
    {
        if(!isset($property->deleted_at))
        {
            return '';
        }
        return view('components.datatables.confirm', [
            'slot' => '<i class="bi bi-trash"></i>',
            'attributes' => new ComponentAttributeBag([
                'action' => route('properties.restore', $property),
                'method' => 'PUT',
                'confirm-text' => __('translations.buttons.yes'),
                'confirm-class' => 'btn btn-success me-2',
                'cancel-text' => __('translations.buttons.no'),
                'cancel-class' => 'btn btn-secondary ms-2',
                'icon' => 'question',
                'message' => __('translations.properties.label.restore-question' ,[
                    'address' => $property->address
                ]),
                'button-class' => 'btn btn-success',
                'button-title' => __('translations.properties.label.restore')
            ])
        ])->render();
    }
}