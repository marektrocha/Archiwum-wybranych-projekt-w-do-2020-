<?php

namespace App\Repositories;

use App\Models\Income;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductRepository extends BaseRepository {

    public function __construct(Product $model) {
        $this->model = $model;
    }

    // POBRANIE REKORDU Z BAZY WG OKREŚLONEGO KRYTERIUM
    public function getAvability() {
        // return $this->model->where('statusProduct','avability')->orderBy('id','asc')->get();         // Elloquent
        return DB::table('products')->where('statusProduct','=','Avability')->get();                    // Query Builder
    }

    public function getUnavability() {
        return DB::table('products')->where('statusProduct','=','Unavability')->get();
    }

    public function amountZero() {
        return DB::table('products')->where('amount','=', 0)->get();
    }

    public function amountFive() {
        return DB::table('products')->where('amount','>', 5)->get();
    }

    // ODEJMIJ Z MAGAZYNU I DODAJ DO 'INCOMES' WG UŻYTKOWNIKA
    static public function buyStore($id_product) {

        $id_user =  Auth::user()->id;
        $amount = DB::table('products')->where('id', $id_product)->value('amount');

        if ($amount <= 0) {
            return $amount = 0;
        } else {
            $newAmount = $amount - 1;
        }

        return  (DB::table('incomes')->insert(['id_user' => $id_user, 'id_product' => $id_product, 'created_at' => now() ])) &&
                (DB::table('products')->where('id', '=', $id_product)->update(['amount' => $newAmount ]));
    }

}

