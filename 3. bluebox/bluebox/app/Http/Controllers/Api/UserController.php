<?php

namespace App\Http\Controllers\Api;

use App\Repositories\UserRepository;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{
        public function index(UserRepository $userRepo) {

        $users = $userRepo->getAll();
        return $users->toJson();
    }
}
