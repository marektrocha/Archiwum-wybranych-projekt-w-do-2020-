<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;                     // odwołanie się do stworzonego modelu user DB
use App\Models\Specialisation;           // odwołanie się do stworzonego modelu Specjalizacji DB
use App\Repositories\UserRepository;     // odwołanie się do UserRepository.php
use Illuminate\Support\Facades\Auth as FacadesAuth; // fasada logowania i zabezpieczania middleware

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(UserRepository $userRepo) {                            // WYŚWIETLANIE LISTY LEKARZY

        if(FacadesAuth::user()->type != 'doctor' && FacadesAuth::user()->type != 'admin') {
            return redirect()->route('login');                                   // header location ('login.php')
        }

        $statistics = $userRepo->getDoctorsStatistics();

        $users = $userRepo->getAllDoctors();

        return view('doctors.list', ["doctorsList"=>$users,
                                     "footerYear" => date('Y'),
                                     "title" => "Moduł lekarzy",
                                     "statistics" => $statistics
                                     ]);
    }

    public function listBySpecialisation(UserRepository $userRepo, $id) {        // WYŚWIETLANIE LISTY LEKARZY WG SPECJALIZACJI

        if(FacadesAuth::user()->type != 'doctor' && FacadesAuth::user()->type != 'admin') {
            return redirect()->route('login');                                   // header location ('login.php')
        }

        $statistics = $userRepo->getDoctorsStatistics();

        $users = $userRepo->getDoctorsBySpecialisation($id);

        return view('doctors.list', ["doctorsList"=>$users,
                                     "footerYear" => date('Y'),
                                     "title" => "Moduł lekarzy",
                                     "statistics" => $statistics
                                     ]);
    }

    public function show(UserRepository $userRepo, $id) {                         // WYŚWIETLANIE POJEDYNCZEGO LEKARZA

        if(FacadesAuth::user()->type != 'doctor' && FacadesAuth::user()->type != 'admin') {
            return redirect()->route('login');                                   // header location ('login.php')
        }

        $doctor = $userRepo->find($id);

        return view('doctors.show', ["doctor"=>$doctor,
                                     "footerYear" => date('Y'),
                                     "title" => "Moduł lekarzy"
                                     ]);
    }

    public function create() {                                                   // DODAWANIE LEKARZA DO LISTY

        if(FacadesAuth::user()->type != 'doctor' && FacadesAuth::user()->type != 'admin') {
            return redirect()->route('login');                                   // header location ('login.php')
        }

        $specialisations = Specialisation::all();

        return view('doctors.create', ["specialisations" => $specialisations, "footerYear" => date('Y') ]);
    }

    public function store(Request $request) {                                    // DODAWANIE NOWEGO LEKARZA

        if(FacadesAuth::user()->type != 'doctor' && FacadesAuth::user()->type != 'admin') {
            return redirect()->route('login');                                   // header location ('login.php')
        }

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'phone' => 'required',
            'pesel' => 'required'
        ]);

        $doctor = new User;
        $doctor->name = $request->input('name');
        $doctor->email = $request->input('email');
        $doctor->password = bcrypt($request->input('password'));
        $doctor->phone = $request->input('phone');
        $doctor->addres = $request->input('address');
        $doctor->pesel = $request->input('pesel');
        $doctor->status = $request->input('status');
        $doctor->type = 'doctor';
        $doctor->save();

        // !!!!!!!!!!!! Synhronizacja lekarza ze specjalizacjami
        $doctor->specialisations()->sync($request->input('specialisations'));

        return redirect()->action('App\Http\Controllers\DoctorController@index');       // header locations
    }

    public function edit(UserRepository $userRepo, $id){                                // EDYCJA (AKTUALIZACJA) LEKARZA PO NR ID

        if(FacadesAuth::user()->type != 'doctor' && FacadesAuth::user()->type != 'admin') {
            return redirect()->route('login');                                          // header location ('login.php')
        }

        $doctor = $userRepo->find($id);                                                 // znajdz lekarza do edycji
        $specialisations = Specialisation::all();

        return view('doctors.edit', ["specialisations" => $specialisations,
                                    "doctor" => $doctor,
                                    "footerYear" => date('Y') ]);
    }

    public function editstore(Request $request) {                                       // EDYCJA LEKARZA

        if(FacadesAuth::user()->type != 'doctor' && FacadesAuth::user()->type != 'admin') {
            return redirect()->route('login');                                          // header location ('login.php')
        }

        $doctor = User::find($request->input('id'));                                    // zamiast dodawać użytkownika (new User) - edytuj
        $doctor->name = $request->input('name');
        $doctor->email = $request->input('email');
        $doctor->phone = $request->input('phone');
        $doctor->addres = $request->input('address');
        $doctor->pesel = $request->input('pesel');
        $doctor->status = $request->input('status');
        $doctor->save();

        // !!!!!!!!!!!! Synhronizacja lekarza ze specjalizacjami
        $doctor->specialisations()->sync($request->input('specialisations'));

        return redirect()->action('App\Http\Controllers\DoctorController@index');       // header locations
    }

    public function delete(UserRepository $userRepo, $id){                              // USUWANIE LEKARZA PO NR ID

        if(FacadesAuth::user()->type != 'doctor' && FacadesAuth::user()->type != 'admin') {
            return redirect()->route('login');                                          // header location ('login.php')
        }

        $doctor = $userRepo->delete($id);
        return redirect('doctors');                                                     // header location to 'doctors'
    }
}
