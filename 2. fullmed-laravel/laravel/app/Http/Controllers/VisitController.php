<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\VisitRepository;    // odwołanie się do VisitRepository.php
use App\Repositories\UserRepository;     // odwołanie się do UserRepository.php
use Illuminate\Support\Facades\Auth as FacadesAuth; // fasada logowania i zabezpieczania middleware
use Illuminate\Support\Facades\Mail as FacadesMail; // fasada wysyłania maili

class VisitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(VisitRepository $visitRepo) {              // WYŚWIETLANIE LISTY WIZYT

        if(FacadesAuth::user()->type != 'doctor' && FacadesAuth::user()->type != 'admin') {
            return redirect()->route('login');                                   // header location ('login.php')
        }

        $visits = $visitRepo->getAll();

        return view('visits.list', ["visits"=>$visits,
                                     "footerYear" => date('Y'),
                                     "title" => "Moduł wizyty"
                                     ]);
    }

    public function create(UserRepository $userRepo) {

        if(FacadesAuth::user()->type != 'doctor' && FacadesAuth::user()->type != 'admin') {
            return redirect()->route('login');                                   // header location ('login.php')
        }

        // tworząc listę należy zdecydować, który lekarz przyjmie, którego pacjenta
        $doctors = $userRepo->getAllDoctors();
        $patients = $userRepo->getAllPatients();

        return view('visits.create', ["patients" => $patients,
                                    "doctors" => $doctors,
                                    "footerYear" => date('Y'),
                                    "title" => "Moduł wizyty"]);
    }

    public function store(Request $request) {

        if(FacadesAuth::user()->type != 'doctor' && FacadesAuth::user()->type != 'admin') {
            return redirect()->route('login');                                   // header location ('login.php')
        }

        $visit = new Visit;                                     // tworzymy nowy obiekt
        $visit->doctor_id = $request->input('doctor');          // pobierz z formularza doctor
        $visit->patient_id = $request->input('patient');        // pobierz z formularza patient
        $visit->data = $request->input('date');                 // pobierz z formularza patient
        $visit->save();                                         // zapisz w bazie

        // $patient = User::find($visit->patient_id);

        // FacadesMail::send('emails.visit', ['visit'=>$visit], function ($m) use ($visit, $patient) {
        //     $m->to($patient->email, $patient->name)->subject('Nowa wizyta');
        // });

        // return redirect()->action('${App\Http\Controllers\VisitController@index}');
        return redirect()->action('App\Http\Controllers\VisitController@index');    // header location
    }
}
