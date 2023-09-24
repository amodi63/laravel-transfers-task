<?php

namespace App\Exports;

use App\Models\Transfer;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransfersExport implements FromQuery, WithHeadings
{
    protected $query;

    
    public function __construct($query)
    {
        $this->query = $query;
    }

    public function query()
    {
        return $this->query->join('users', 'users.id', '=', 'transfers.user_id')
                        ->join('merchants', 'merchants.id', '=', 'transfers.merchant_id')
                        ->select('transfers.id', 'transfers.amount', 'transfers.deduction_entered', 'transfers.wallet_balance_before', 'transfers.wallet_balance_after', 'transfers.code', 'transfers.user_id', 'transfers.merchant_id', 'users.first_name as user_name', 'merchants.first_name as merchant_name');
    }

    public function headings(): array
    {
        return [
            'ID',
            'Amount',
            'Deduction Entered',
            'Wallet Balance Before',
            'Wallet Balance After',
            'Code',
            'User ID',
            'Merchant ID',
            'User Name',
            'Merchant Name',
        ];
    }
}