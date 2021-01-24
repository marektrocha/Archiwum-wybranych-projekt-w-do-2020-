<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\ProductRepository;

class UserController extends Controller
{
    public function index(UserRepository $userRepo) {

        $users = $userRepo->getAll();

        return view('users.list', ['users'=>$users,
                                      'footerYear'=>date("Y"),
                                      'title'=>'Customers']);
    }

    public function store(Request $request) {

        // Walidation of form
        $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return view('users.confirm', ['footerYear'=>date("Y"),
                                      'title'=>'Customers']);
    }
}
