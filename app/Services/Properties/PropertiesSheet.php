<?php

namespace App\Services\Properties;

use App\Models\Property;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PropertiesSheet implements
        FromCollection,
        WithHeadings,
        WithMapping,
        WithTitle

{
    public function title(): string
    {
        return __('translations.properties.title');
    }

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
}