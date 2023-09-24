<?php

namespace App\Http\Controllers;

use App\Interfaces\MerchantRepositoryInterface;
use App\Models\Merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    /**
     * @var MerchantRepositoryInterface
     */

    public function __construct(private MerchantRepositoryInterface $merchantRepository)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $merchants = $this->merchantRepository->getAllMerchants();
        return view('admin.merchant.index', compact('merchants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $merchant = $this->merchantRepository->createMerchant($request->all());
        return response()->json(
            [
                'success' => true,
                'data' => $merchant,
                'message' => 'Merchant created successfully!'
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Merchant $merchant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Merchant $merchant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Merchant $merchant)
    {
        $merchant = $this->merchantRepository->updateMerchant($merchant->id, $request->all());
        return response()->json(
            [
                'success' => true,
                'data' => $merchant,
                'message' => 'Merchant updated successfully!'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merchant $merchant)
    {
        $this->merchantRepository->deleteMerchant($merchant->id);
        return response()->json(
            [
                'success' => true,
                'message' => 'Merchant deleted successfully!'
            ]
        );
    }
}
