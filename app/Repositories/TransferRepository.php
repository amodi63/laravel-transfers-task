<?php

namespace App\Repositories;

use App\Interfaces\TransferRepositoryInterface;
use App\Models\Transfer;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransfersExport;
use Illuminate\Http\Request;

class TransferRepository implements TransferRepositoryInterface
{


    public function getAllTransfers()
    {
        return   Transfer::with(['user:id,first_name,last_name,profile_picture', 'merchant:id,first_name,last_name,account_number'])->latest();
    }

    public function getUserTransfers($user_id){
        return Transfer::where('user_id', $user_id)->latest()->paginate();

    }

    public function createTransferSP($user_id, $merchant_id, $amount, $deduction_entered,$deduction_fixed)
    {
      
        DB::statement('CALL transfer(?, ?, ?,?,?)', [$user_id, $merchant_id, $amount,$deduction_entered ,$deduction_fixed]);
    }

    public function updateTransfer($transfer_id, array $data)
    {
        return Transfer::find($transfer_id)->update($data);
    }

    public function deleteTransfer($transfer_id)
    {
        return Transfer::destroy($transfer_id);
    }

    public function exportTransfers(array $data)
{
    $query = Transfer::with(['user', 'merchant'])
        ->select('id', 'amount', 'deduction_entered', 'wallet_balance_before', 'wallet_balance_after', 'code', 'user_id', 'merchant_id');
    
    if (isset($data['from_date'])) {
        $query->whereDate('created_at', '>=', $data['from_date']);
    }
    if (isset($data['to_date'])) {
        $query->whereDate('created_at', '<=', $data['to_date']);
    }
    if (isset($data['amount'])) {
        $operator = $data['amount_operator'];
        $amount = $data['amount'];
        $query->where('amount', $operator, $amount);
    }
   
    $query = $query->get();
    $new_query = $query->map(function ($item) {
            $item['id'] = $item->id;
            $item['amount'] = $item->amount;
            $item['deduction_entered'] = $item->deduction_entered;
            $item['wallet_balance_before'] = $item->wallet_balance_before;
            $item['wallet_balance_after'] = $item->wallet_balance_after;
            $item['code'] = $item->code;
            $item['user_id'] = $item->user->first_name . ' ' . $item->user->last_name;
            $item['merchant_id'] = $item->merchant->first_name . ' ' . $item->merchant->last_name;
            $item['created_at'] = $item->created_at;
            return $item;
        
    });

    return Excel::download(new TransfersExport($new_query), 'transfers.xlsx');
}
    
}