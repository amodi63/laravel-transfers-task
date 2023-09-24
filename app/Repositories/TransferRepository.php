<?php

namespace App\Repositories;

use App\Interfaces\TransferRepositoryInterface;
use App\Models\Transfer;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransfersExport;



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

    public function exportTransfers()
    {
        $query = Transfer::with(['user', 'merchant'])
        ->select('id', 'amount', 'deduction_entered', 'wallet_balance_before', 'wallet_balance_after', 'code', 'user_id', 'merchant_id');

        return Excel::download(new TransfersExport($query), 'transfers.xlsx');
    }
    
}