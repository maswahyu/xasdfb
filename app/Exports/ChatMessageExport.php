<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ChatMessageExport implements FromCollection,WithMapping,WithHeadings
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function headings(): array
    {
        return [
            'Time',
            'Name',
            'Message',
            'Date',
        ];
    }

    public function map($model): array
    {
        return [
            $model->chatTime,
            $model->name,
            $model->message,
            $model->created_at
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
