<?php

namespace App\Repositories;

use App\Models\Income;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IncomeRepository extends BaseRepository {

    public function __construct(Income $model) {
        $this->model = $model;
    }

    public function getYourProducts() {
        return DB::table('incomes')->where('id_user','=', (Auth::user()->id))->get();
    }
}
