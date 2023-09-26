<?php

namespace App\Exports;

use App\Models\Transfer;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransfersExport implements FromCollection, WithHeadings, WithColumnWidths
{
    protected $query;

    
    public function __construct($query)
    {
        $this->query = $query;
    }

    public function collection()
    {
        return $this->query;
    }

    public function headings(): array
    {
        return [
            '#',
            'Amount',
            'Deduction Entered',
            'Wallet Balance Before',
            'Wallet Balance After',
            'Code',
            'User Name',
            'Merchant Name',
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 10,
            'C' => 10,
            'D' => 20,
            'E' => 20,
            'F' => 45,
            'G' => 35,
            'H' => 35,
        ];
    }
  
   
}