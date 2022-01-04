<?php

namespace App\Services\Properties;

use App\Models\Property;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportPropertiesToExcelService implements FromCollection, WithEvents, WithHeadings, WithMapping
{
    public function collection()
    {
        return Property::withTrashed()
        ->with(['property_type'])
        ->get();
    }

    public function headings(): array
    {
        return[
            '#',
            __('translations.properties.attribute.address'),
            __('translations.properties.attribute.property_type'),
            __('translations.properties.attribute.area_square_meters'),
            __('translations.properties.attribute.rooms'),
            __('translations.properties.attribute.floor'),
            __('translations.properties.attribute.number_of_floor'),
            __('translations.properties.attribute.description'),
            __('translations.attribute.created_at'),
            __('translations.attribute.updated_at'),
            __('translations.attribute.deleted_at'),

        ];
    }

    public function map($property): array
    {
        return [
            $property->id,
            $property->address,
            $property->property_type->name,
            $property->area_square_meters,
            $property->rooms,
            $property->floor,
            $property->number_of_floor,
            $property->description,
            $property->created_at,
            $property->updated_at,
            $property->deleted_at
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeExport::class => function (BeforeExport $event) {
            },
            BeforeWriting::class => function (BeforeWriting $event) {
            },
            BeforeSheet::class => function (BeforeSheet $event) {
            },
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A1:K1')->getFont()->setBold(true);
                $event->sheet->getDelegate()->getColumnDimension('A')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getStyle('B1:B' . $event->sheet->getHighestRow())
                    ->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('D')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('E')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('F')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('G')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(100);
                $event->sheet->getStyle('H1:H' . $event->sheet->getHighestRow())
                    ->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getColumnDimension('I')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('J')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('K')->setAutoSize(true);
            },

        ];
    }
}