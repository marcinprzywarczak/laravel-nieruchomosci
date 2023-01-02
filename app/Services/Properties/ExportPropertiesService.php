<?php

namespace App\Services\Properties;

use Maatwebsite\Excel\Excel;
use App\Services\Properties\PropertiesToPdfExport;
use Maatwebsite\Excel\Facades\Excel as ExcelFacade;
use App\Services\Properties\PropertiesToExcelExport;


class ExportPropertiesService 
{
    public static function downloadExcel(string $fileName)
    {
        return ExcelFacade::download(
            new PropertiesToExcelExport(),
            $fileName . '.xlsx',
            Excel::XLSX
        );
    }

    public static function downloadPdf(string $fileName)
    {
        return ExcelFacade::download(
            new PropertiesToPdfExport(),
            $fileName . '.pdf',
            Excel::MPDF
        );
    }
}