<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
   
    public function getDeductionEnteredAttribute($value)
    {
        return ($value !== null) ? $value * 100 : self::FIXED_DEDUCTIONS;
    }

    public function getDeductionFixedAttribute($value)
    {
        return ($value !== null) ? $value * 100 : self::FIXED_DEDUCTIONS;
    }

    public function scopeFilter($query, $fromDate, $toDate, $amountOperator, $amount)
    {
        
       
        if ($fromDate) {
            $query->whereDate('created_at', '>=', $fromDate);
        }
        if ($toDate) {
            $query->whereDate('created_at', '<=', $toDate);
        }
        if ($amount) {
            $query->where('amount', $amountOperator, $amount);

        }
        return $query;
    }
    



}
