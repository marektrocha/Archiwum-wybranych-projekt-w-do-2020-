<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;                     // odwołanie się do stworzonego modelu user DB
use App\Models\Specialisation;           // odwołanie się do stworzonego modelu Specjalizacji DB
use App\Repositories\UserRepository;     // odwołanie się do UserRepository.php
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Routing\Route;

class DoctorController extends BaseController
{
    public function index(UserRepository $userRepo) {

        $users = $userRepo->getAllDoctors();

        return $users->toJson();
    }

}

Route::get('doctors/', 'App\Http\Controllers\Api\DoctorController@index');
