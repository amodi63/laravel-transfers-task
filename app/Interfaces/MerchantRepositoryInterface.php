<?php
namespace App\Interfaces;

interface MerchantRepositoryInterface
{
    public function getAllMerchants();
    public function getMerchants(array $search);
    public function createMerchant(array $data);
    public function getMerchantById($merchant_id);
    public function updateMerchant($merchant_id, array $data);
    public function deleteMerchant($merchant_id);
}