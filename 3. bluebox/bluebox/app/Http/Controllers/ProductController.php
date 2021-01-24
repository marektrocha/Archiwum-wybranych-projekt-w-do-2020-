<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(ProductRepository $productRepo) {         // wstrzyknięcie zależności

        if(Auth::user()->statusUser != 'client' && Auth::user()->statusUser != 'admin') {
            return redirect()->route('login');
        }

        $products = $productRepo->getAll();
        return view('products.list', ['productsList'=>$products,
                                      'footerYear'=>date("Y"),
                                      'title'=>'Products']);
    }

    public function indexAvability(ProductRepository $productRepo) {

        if(Auth::user()->statusUser != 'client' && Auth::user()->statusUser != 'admin') {
            return redirect()->route('login');
        }

        $products = $productRepo->getAvability();
        return view('products.list', ['productsList'=>$products,
                                      'footerYear'=>date("Y"),
                                      'title'=>'Products']);
    }

    public function indexUnavability(ProductRepository $productRepo) {

        if(Auth::user()->statusUser != 'client' && Auth::user()->statusUser != 'admin') {
            return redirect()->route('login');
        }

        $products = $productRepo->getUnavability();
        return view('products.list', ['productsList'=>$products,
                                      'footerYear'=>date("Y"),
                                      'title'=>'Products']);
    }

    public function amountZero(ProductRepository $productRepo) {

        if(Auth::user()->statusUser != 'client' && Auth::user()->statusUser != 'admin') {
            return redirect()->route('login');
        }

        $products = $productRepo->amountZero();
        return view('products.list', ['productsList'=>$products,
                                      'footerYear'=>date("Y"),
                                      'title'=>'Products']);
    }

    public function amountFive(ProductRepository $productRepo) {

        if(Auth::user()->statusUser != 'client' && Auth::user()->statusUser != 'admin') {
            return redirect()->route('login');
        }

        $products = $productRepo->amountFive();
        return view('products.list', ['productsList'=>$products,
                                      'footerYear'=>date("Y"),
                                      'title'=>'Products']);
    }

    public function create() {

        if(Auth::user()->statusUser != 'admin') {
            return redirect()->route('login');
        }

        return view('products.create', ['footerYear'=>date("Y")]);
    }

    public function store(Request $request) {

        if(Auth::user()->statusUser != 'admin') {
            return redirect()->route('login');
        }

        // Walidation of form
        $request->validate([
            'name' => 'required|max:255',
            'content' => 'required',
            'amount' => 'required',
            'price' => 'required'
        ]);

        $product = new Product;
        $product->name = $request->input('name');
        $product->content = $request->input('content');
        $product->amount = $request->input('amount');
        $product->price = $request->input('price');
        $product->statusProduct = $request->input('statusProduct');
        $product->save();

        return redirect()->action('App\Http\Controllers\ProductController@index');
    }

    public function edit(ProductRepository $productRepo, $id) {     // wstrzyknięcie repozytorium

        if(Auth::user()->statusUser != 'admin') {
            return redirect()->route('login');
        }

        $product = $productRepo->find($id);
        return view('products.edit', ['product'=>$product,
                                      'footerYear'=>date("Y")]);
    }

    public function editStore(Request $request) {

        if(Auth::user()->statusUser != 'admin') {
            return redirect()->route('login');
        }

        $product = Product::find($request->input('id'));
        $product->name = $request->input('name');
        $product->content = $request->input('content');
        $product->amount = $request->input('amount');
        $product->price = $request->input('price');
        $product->statusProduct = $request->input('statusProduct');
        $product->save();

        return redirect()->action('App\Http\Controllers\ProductController@index');
    }

    public function delete(ProductRepository $productRepo, $id) {   // wstrzyknięcie repozytorium

        if(Auth::user()->statusUser != 'admin') {
            return redirect()->route('login');
        }

        $product = $productRepo->delete($id);
        return redirect('products');
    }

    public function buy(ProductRepository $productRepo, $id) {

        if(Auth::user()->statusUser != 'client' && Auth::user()->statusUser != 'admin') {
            return redirect()->route('login');
        }

        $product = $productRepo->find($id);
        return view('products.buy', ['productBuy'=>$product,
                                      'footerYear'=>date("Y")]);
    }

    public function buyStore(Request $request) {

        if(Auth::user()->statusUser != 'client' && Auth::user()->statusUser != 'admin') {
            return redirect()->route('login');
        }

        // error_log($request);
        ProductRepository::buyStore($request->input('id'));

        return redirect()->action('App\Http\Controllers\ProductController@payment');
    }

    public function payment() {

        return view('products.payment', ['footerYear'=>date("Y")]);
    }
}
