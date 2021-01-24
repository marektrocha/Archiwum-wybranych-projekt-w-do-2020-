<?php

namespace App\Http\Controllers\Api;

use App\Repositories\ProductRepository;
use Illuminate\Routing\Controller as BaseController;

class ProductController extends BaseController
{
        public function index(ProductRepository $productRepo) {

        $products = $productRepo->getAll();
        return $products->toJson();
    }
}
