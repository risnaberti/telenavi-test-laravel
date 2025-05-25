<?php

namespace App\Exports;

use App\Models\Todo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class TodoExport implements FromCollection, WithHeadings, WithEvents
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function collection()
    {
        return $this->query->get([
            'title',
            'assignee',
            'due_date',
            'time_tracked',
            'status',
            'priority'
        ]);
    }

    public function headings(): array
    {
        return ['Title', 'Assignee', 'Due Date', 'Time Tracked', 'Status', 'Priority'];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $rowCount = $event->sheet->getDelegate()->getHighestRow();
                $summaryRow = $rowCount + 2;

                $event->sheet->setCellValue("A{$summaryRow}", 'SUMMARY');
                $event->sheet->setCellValue("A" . ($summaryRow + 1), 'Total Todos');
                $event->sheet->setCellValue("B" . ($summaryRow + 1), $rowCount - 1);

                $totalTimeTracked = $this->query->sum('time_tracked');
                $event->sheet->setCellValue("A" . ($summaryRow + 2), 'Total Time Tracked');
                $event->sheet->setCellValue("B" . ($summaryRow + 2), $totalTimeTracked);
            },
        ];
    }
}
