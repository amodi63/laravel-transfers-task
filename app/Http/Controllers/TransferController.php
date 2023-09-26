<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransferReequest;
use App\Http\Requests\TransferRequest;
use App\Interfaces\MerchantRepositoryInterface;
use App\Interfaces\TransferRepositoryInterface;
use App\Models\Admin\ConversionController;
use App\Models\Transfer;
use App\Models\User;
use App\Repositories\TransferRepository;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

use function Psy\debug;

class TransferController extends Controller
{
    /**
     * @var TransferRepositoryInterface
     */

    public function __construct(private TransferRepositoryInterface $transferRepository)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transfers = $this->transferRepository->getAllTransfers()->paginate();
        $operators = Transfer::OPERATORS;

        return view('admin.transfers.all-transfers', compact('transfers','operators'));
    }

    /**
     * Get all transfers for the all user.
     */
    public function datatable(Request $request)
    {
        if ($request->ajax()) {
          
            $data = $this->transferRepository->getAllTransfers()->orderBy('id', 'desc');
           
            return DataTables::of($data)
            
                ->filter(function ($data) use ($request) {
                    $data->filter($request->input('search.value'),$request->input('from_date'), $request->input('to_date'), $request->input('amount_operator'), $request->input('amount'));
                })
                ->addIndexColumn()
                ->addColumn('merchant_name', function ($row) {
                    return $row->merchant->full_name;
                })
                ->addColumn('account_number', function ($row) {

                    return $row->merchant->account_number;
                })
                ->addColumn('merchant_balance_before', function ($row) {
                    return $row->merchant_balance_before;
                })
                ->addColumn('merchant_balance_after', function ($row) {
                    return $row->merchant_balance_after;
                })
                ->addColumn('code', function ($row) {
                    return $row->code;
                })

                ->addColumn('wallet_balance_before', function ($row) {
                    return $row->wallet_balance_before;
                })
                ->addColumn('wallet_balance_after', function ($row) {
                    return $row->wallet_balance_after;
                })



                ->editColumn('created_at', function ($row) {
                    return [
                        'display' => $row->created_at->format('d-m-Y'),
                    ];
                })
                ->editColumn('profile_picture', function ($row) {

                    return [
                        'display' => $row->profile_picture,
                    ];
                })
                ->addColumn('action', function ($row) {

                    return  view('admin.transfers.actions', compact('row'))->render();
                })
                ->rawColumns(['action'])
                ->toJson();
        }
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $merchants =  app()->make(MerchantRepositoryInterface::class)->getAllMerchants();
        $transfers = $this->transferRepository->getUserTransfers(Auth::id());
        $fixed_deductions = Transfer::FIXED_DEDUCTIONS;



        return view('admin.transfers.create', compact('merchants', 'fixed_deductions', 'transfers'));
    }

    /**
     * Store a newly created resource in storage.
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
        $transfers = $this->transferRepository->getUserTransfers(Auth::id());
        $html  = view('admin.transfers.transfers-users-tbl', compact('transfers'))->render();

        return response()->json([
            'message' => 'Transfer Created Successfully!',
            'html' => $html,
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function exportTransfers(Request $request)
    {
     
        return  $this->transferRepository->exportTransfers($request->all());
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transfer $transfer)
    {

        $this->transferRepository->deleteTransfer($transfer->id);
        $transfers = $this->transferRepository->getUserTransfers(Auth::id());
        $html  = view('admin.transfers.transfers-users-tbl', compact('transfers'))->render();

        return response()->json([
            'message' => 'Transfer deleted successfully!',
            'html' => $html,
        ]);
    }
}
