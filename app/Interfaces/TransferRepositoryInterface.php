<?php
namespace App\Interfaces;

interface TransferRepositoryInterface
{
    public function getAllTransfers();
    public function getUserTransfers($user_id);
    public function createTransferSP($user_id, $merchant_id, $amount, $deduction_entered, $deduction_fixed);
    public function updateTransfer($transfer_id, array $data);
    public function deleteTransfer($transfer_id);
    public function exportTransfers();


}