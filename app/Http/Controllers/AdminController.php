<?php

namespace App\Http\Controllers;

use App\Interfaces\TransferRepositoryInterface;
use App\Models\Merchant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $data = [];
        $data['users_count'] = User::count();
        $data['merchants_count'] = Merchant::count();
      
        return view('admin.dashboard',$data);
    }
    public function merchantIndex(){
      $transfers =  app()->make(TransferRepositoryInterface::class)->getUserTransfers(Auth::id());
        return view('merchant.dashboard',compact('transfers'));
    }
}
