<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;                    // odwołanie się do stworzonego modelu user
use App\Repositories\UserRepository;    // odwołanie się do UserRepository.php
use Illuminate\Support\Facades\Auth as FacadesAuth; // fasada logowania i zabezpieczania middleware

class PatientController extends Controller
{
    public function index(UserRepository $userRepo) {                               // WYŚWIETLANIE LISTY PACJENTÓW

        if(FacadesAuth::user()->type != 'doctor' && FacadesAuth::user()->type != 'admin') {
            return redirect()->route('login');                                      // header location ('login.php')
        }

        $users = $userRepo->getAllPatients();

        return view('patients.list', ["patientsList"=>$users,
                                     "footerYear" => date('Y'),
                                     "title" => "Moduł pacjentów"
                                     ]);
    }

    public function show(UserRepository $userRepo, $id) {                           // WYŚWIETLANIE POJEDYNCZEGO PACIENTA

        if(FacadesAuth::user()->type != 'doctor' && FacadesAuth::user()->type != 'admin') {
            return redirect()->route('login');                                      // header location ('login.php')
        }

        $patient = $userRepo->find($id);

        return view('patients.show', ["patient"=>$patient,
                                     "footerYear" => date('Y'),
                                     "title" => "Moduł pacjentów"
                                     ]);
    }

    public function store(Request $request) {                                       // DODAWANIE NOWEGO PACJENTA
                                                                                    // Bez autoryzacji czy admin czy lekarz, gdyż każdy powinien mieć tu dostęp
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'phone' => 'required',
            'pesel' => 'required'
        ]);

        $patient = new User;
        $patient->name = $request->input('name');
        $patient->email = $request->input('email');
        $patient->password = bcrypt($request->input('password'));
        $patient->phone = $request->input('phone');
        $patient->addres = $request->input('address');
        $patient->pesel = $request->input('pesel');
        $patient->status = $request->input('status');
        $patient->type = 'patient';
        $patient->save();

        return view('patients.confim', ["footerYear" => date('Y'),
                                     "title" => "Moduł pacjentów"
                                     ]);
    }
}
