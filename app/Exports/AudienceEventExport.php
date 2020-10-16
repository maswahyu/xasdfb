<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class AudienceEventExport implements FromCollection,WithMapping,WithHeadings
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function headings(): array
    {
        return [
            'Name',
            'Phone',
            'Register At Event',
            'Register Date',
            'Type',
        ];
    }

    public function map($model): array
    {
        return [
            $model->name,
            $model->phone,
            $model->event->name,
            $model->created_at ? Date::dateTimeToExcel($model->created_at) : $model->created_at,
            $model->type,
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->data;
    }
}
