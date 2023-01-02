<?php

namespace App\Services\Properties;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PropertiesToExcelExport implements WithMultipleSheets
{
    use Exportable;

    public function sheets(): array
    {
        return [
            new PropertiesExcelSheet()
        ];
    }
}