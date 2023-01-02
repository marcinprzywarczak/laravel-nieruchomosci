<?php

namespace App\Services\Properties;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeWriting;
use App\Services\Properties\PropertiesPdfSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PropertiesToPdfExport implements WithMultipleSheets, WithEvents
{
    use Exportable;

    public function sheets(): array
    {
        return 
        [
            new PropertiesPdfSheet()
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeExport::class => function (BeforeExport $event) {
            },
            BeforeWriting::class => function (BeforeWriting $event) {
                $event->getWriter()->getDelegate()->getActiveSheet()
                    ->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4);

                $event->getWriter()->getDelegate()->getActiveSheet()
                    ->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
            },
        ];
        
    }
}