<?php

namespace App\Http\Controllers;

use App\Repositories\IncomeRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(IncomeRepository $incomeRepo) {

        if(Auth::user()->statusUser != 'admin') {
            return redirect()->route('login');
        }

        $incomes = $incomeRepo->getAll();

        return view('incomes.list', ['incomes'=>$incomes,
                                     'footerYear'=>date("Y"),
                                     'title'=>'Customers and incomes']);
    }

    public function show(IncomeRepository $productRepo) {

        $products = $productRepo->getYourProducts();
        return view('incomes.show', ['products'=>$products,
                                     'footerYear'=>date("Y"),
                                     'title'=>'Your products']);
    }
}


