<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
        'deduction_entered',
        'wallet_balance_before',
        'wallet_balance_after',
        'merchant_balance_before',
        'merchant_balance_after',
        'code',
        'user_id',
        'merchant_id',
    ];

     /**
     * Get the transaction that owns the transfer.
     */
   
    const FIXED_DEDUCTIONS = 0.015;

    /**
     * 
     * Get the user that owns the transfer.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the merchant that owns the transfer.
     */
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
   
    //make scope to make fillter on the transfer table
    //make scope to make fillter on the transfer table


    public function scopeFillter()
    {
        return $this->when(request()->filled('search'), function($query) {
            $query->WhereHas('merchant', function($query) {
            
                $query->select('id', 'first_name', 'last_name')->where(function($query) {
                    $query->where('first_name', 'like', '%'.request()->search.'%')
                        ->orWhere('last_name', 'like', '%'.request()->search.'%');
                });
            });
    
            if (request()->filled('from_date')) {
                $query->where('created_at', '>=', request()->from_date);
            }
    
            if (request()->filled('to_date')) {
                $query->where('created_at', '<=', request()->to_date);
            }
    
            if (request()->filled('amount_operator') && request()->filled('amount')) {
                $amountOperator = request()->amount_operator;
                $amount = request()->amount;
                switch ($amountOperator) {
                    case 'greater':
                        $query->where('amount', '>', $amount);
                        break;
                    case 'smaller':
                        $query->where('amount', '<', $amount);
                        break;
                    case 'equal':
                        $query->where('amount', '=', $amount);
                        break;
                }
            }
        });
    }
    



}
