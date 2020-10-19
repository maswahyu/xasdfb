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
            'Join Time',
            'Type',
        ];
    }

    public function map($model): array
    {
        return [
            $model->audience_as,
            $model->created_at,
            $model->sso_id ? 'User' : 'Guest',
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
