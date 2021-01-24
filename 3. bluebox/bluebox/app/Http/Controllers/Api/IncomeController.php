<?php

namespace App\Http\Controllers\Api;

use App\Repositories\IncomeRepository;
use Illuminate\Routing\Controller as BaseController;

class IncomeController extends BaseController
{
        public function index(IncomeRepository $incomeRepo) {

        $incomes = $incomeRepo->getAll();
        return $incomes->toJson();
    }
}
