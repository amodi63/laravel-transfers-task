<?php

namespace App\Repositories;

use App\Interfaces\MerchantRepositoryInterface;
use App\Models\Merchant;

class MerchantRepository implements MerchantRepositoryInterface
{
    public function getAllMerchants()
    {
        return Merchant::all();
    }
    public function getMerchants( array $search)
    {
        return Merchant::filter($search)->get();
    }
    public function createMerchant(array $data)
    {
        return Merchant::create($data);
    }
    public function getMerchantById($merchant_id)
    {
        return Merchant::findOrFail($merchant_id);
    }
    public function updateMerchant($merchant_id, array $data)
    {
        return Merchant::find($merchant_id)->update($data);
    }
    public function deleteMerchant($merchant_id)
    {
        return Merchant::destroy($merchant_id);
    }
   
    
}