<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\TransferRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TransferRequest;
use App\Http\Resources\TransferResource;
use App\Models\Transfer;

class TransferController extends Controller
{
    public function __construct(private TransferRepositoryInterface $transferRepository)
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transfers = $this->transferRepository->getAllTransfers()->paginate();
        $transfers =  TransferResource::collection($transfers);

        return response()->json(compact('transfers'), 200);
    }
    
   /**
     * Show the form for creating a new resource.
     */
    public function store(TransferRequest $request)
    {
        $user = Auth::user();
        if ($user->balance < $request->input('amount')) {
            return response()->json([
                'message' => 'You do not have enough balance to make this transfer!',
            ], 422);
        }
        $this->transferRepository->createTransferSP($user->id, $request->input('merchant_id'), $request->input('amount'), $request->input('deduction_entered'), Transfer::FIXED_DEDUCTIONS);

        return response()->json([
            'message' => 'Transfer Created Successfully!',
        ], 201);
    }

    
    /**
     * Export all transfers to excel file.
     */

    public function exportTransfers()
    {
        return $this->transferRepository->exportTransfers();
    }

  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transfer $transfer)
    {
        $this->transferRepository->deleteTransfer($transfer->id);

        return response()->json([
            'message' => 'Transfer deleted successfully!',
        ], 204);
    }
}
